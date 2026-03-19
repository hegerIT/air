<?php
/**
 * Plugin Name: AIR Protocol
 * Plugin URI: https://github.com/hegerIT/air
 * Description: Makes your WordPress site AI-readable through the AIR (AI Readable) protocol. Provides structured JSON endpoints for AI assistants.
 * Version: 0.1.0
 * Author: heger.IT GmbH
 * Author URI: https://air.heger.it
 * License: MIT
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.4
 * Text Domain: air-protocol
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Plugin constants
define('AIR_PROTOCOL_VERSION', '0.1.0');
define('AIR_PROTOCOL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('AIR_PROTOCOL_PLUGIN_URL', plugin_dir_url(__FILE__));

// Main plugin class
class AIR_Protocol {
    
    public function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'admin_menu'));
        register_activation_hook(__FILE__, array($this, 'activate'));
        register_deactivation_hook(__FILE__, array($this, 'deactivate'));
    }
    
    public function init() {
        // Add rewrite rules for AIR endpoints
        add_rewrite_rule('^\.well-known/air/?$', 'index.php?air_discovery=1', 'top');
        add_rewrite_rule('^air/?$', 'index.php?air_api=1', 'top');
        
        // Add query vars
        add_filter('query_vars', array($this, 'add_query_vars'));
        
        // Handle AIR requests
        add_action('template_redirect', array($this, 'handle_air_request'));
        
        // Add subdomain support message
        add_action('admin_notices', array($this, 'subdomain_notice'));
    }
    
    public function add_query_vars($vars) {
        $vars[] = 'air_discovery';
        $vars[] = 'air_api';
        return $vars;
    }
    
    public function handle_air_request() {
        global $wp_query;
        
        if (get_query_var('air_discovery')) {
            $this->output_discovery();
            exit;
        }
        
        if (get_query_var('air_api')) {
            $this->output_api();
            exit;
        }
    }
    
    public function output_discovery() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        
        $discovery = array(
            'protocol' => 'AIR',
            'version' => '1.0',
            'specification' => 'https://github.com/hegerIT/air/blob/main/SPECIFICATION.md',
            'endpoints' => array(
                'discovery' => home_url('/.well-known/air'),
                'api' => home_url('/air')
            ),
            'formats' => array('json'),
            'methods' => array('GET'),
            'updated' => current_time('c')
        );
        
        echo json_encode($discovery, JSON_PRETTY_PRINT);
    }
    
    public function output_api() {
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
        header('Cache-Control: public, max-age=3600');
        
        $data = $this->get_air_data();
        
        // Handle query parameters
        if (empty($_GET) || (count($_GET) == 1 && isset($_GET['air_api']))) {
            // Discovery mode
            $sections = array_keys($data);
            $response = array(
                'protocol' => 'AIR v0.1.0',
                'domain' => $_SERVER['HTTP_HOST'],
                'sections' => $sections,
                'endpoints' => array_map(function($section) {
                    return home_url('/air?' . strtolower($section) . '=1');
                }, $sections),
                'generated' => current_time('c'),
                'source' => 'WordPress AIR Plugin v' . AIR_PROTOCOL_VERSION
            );
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            // Specific section request
            $requested_sections = array();
            
            foreach ($_GET as $key => $value) {
                if ($key === 'air_api') continue;
                
                $section_key = ucfirst(strtolower($key));
                if (isset($data[$section_key])) {
                    if (empty($value) || $value === '1' || $value === 'true') {
                        $requested_sections[$section_key] = $data[$section_key];
                    } else {
                        // Filter by value
                        $filtered = $this->filter_section($data[$section_key], $value);
                        if (!empty($filtered)) {
                            $requested_sections[$section_key] = $filtered;
                        }
                    }
                }
            }
            
            if (empty($requested_sections)) {
                http_response_code(404);
                echo json_encode(array('error' => 'No matching sections found'));
            } else {
                echo json_encode($requested_sections, JSON_PRETTY_PRINT);
            }
        }
    }
    
    public function get_air_data() {
        $options = get_option('air_protocol_settings', array());
        
        // Default data structure
        $data = array(
            'Contact' => array(
                'Company' => get_bloginfo('name'),
                'Email' => get_option('admin_email'),
                'Website' => home_url(),
                'Phone' => $options['phone'] ?? '',
                'Address' => $options['address'] ?? ''
            ),
            'Services' => $this->get_services_data($options),
            'Location' => array(
                'Address' => $options['address'] ?? '',
                'City' => $options['city'] ?? '',
                'Country' => $options['country'] ?? '',
                'Hours' => $options['hours'] ?? 'Please contact us'
            ),
            'About' => array(
                'Description' => get_bloginfo('description'),
                'Founded' => $options['founded'] ?? '',
                'Employees' => $options['employees'] ?? '',
                'Industry' => $options['industry'] ?? ''
            )
        );
        
        // Remove empty sections
        return array_filter($data, function($section) {
            return !empty(array_filter($section));
        });
    }
    
    public function get_services_data($options) {
        $services = array();
        
        // Get from custom post type if exists
        if (post_type_exists('service')) {
            $service_posts = get_posts(array(
                'post_type' => 'service',
                'numberposts' => -1,
                'post_status' => 'publish'
            ));
            
            foreach ($service_posts as $service) {
                $services[] = $service->post_title . ': ' . wp_trim_words($service->post_content, 20);
            }
        }
        
        // Get from WooCommerce products if available
        if (class_exists('WooCommerce')) {
            $products = wc_get_products(array('limit' => 10, 'status' => 'publish'));
            foreach ($products as $product) {
                $services[] = $product->get_name() . ': ' . wc_price($product->get_price());
            }
        }
        
        // Fallback to manual services from options
        if (empty($services) && !empty($options['services'])) {
            $services = explode("\n", $options['services']);
        }
        
        return array_filter($services);
    }
    
    public function filter_section($section, $filter_value) {
        $filtered = array();
        foreach ($section as $key => $value) {
            if (is_string($value) && stripos($value, $filter_value) !== false) {
                $filtered[$key] = $value;
            } elseif (is_string($key) && stripos($key, $filter_value) !== false) {
                $filtered[$key] = $value;
            }
        }
        return $filtered;
    }
    
    public function admin_menu() {
        add_options_page(
            'AIR Protocol Settings',
            'AIR Protocol', 
            'manage_options',
            'air-protocol',
            array($this, 'admin_page')
        );
    }
    
    public function admin_page() {
        if (isset($_POST['submit'])) {
            check_admin_referer('air_protocol_settings');
            
            $settings = array(
                'phone' => sanitize_text_field($_POST['phone']),
                'address' => sanitize_textarea_field($_POST['address']),
                'city' => sanitize_text_field($_POST['city']),
                'country' => sanitize_text_field($_POST['country']),
                'hours' => sanitize_textarea_field($_POST['hours']),
                'founded' => sanitize_text_field($_POST['founded']),
                'employees' => sanitize_text_field($_POST['employees']),
                'industry' => sanitize_text_field($_POST['industry']),
                'services' => sanitize_textarea_field($_POST['services'])
            );
            
            update_option('air_protocol_settings', $settings);
            echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
        }
        
        $settings = get_option('air_protocol_settings', array());
        include AIR_PROTOCOL_PLUGIN_DIR . 'admin-page.php';
    }
    
    public function subdomain_notice() {
        $screen = get_current_screen();
        if ($screen->id === 'settings_page_air-protocol') {
            $current_domain = $_SERVER['HTTP_HOST'];
            if (!str_starts_with($current_domain, 'air.')) {
                echo '<div class="notice notice-info">
                    <p><strong>AIR Protocol Tip:</strong> For best compatibility, set up a subdomain <code>air.' . $current_domain . '</code> pointing to your WordPress installation.</p>
                </div>';
            }
        }
    }
    
    public function activate() {
        // Add rewrite rules
        $this->init();
        flush_rewrite_rules();
        
        // Create default settings
        if (!get_option('air_protocol_settings')) {
            update_option('air_protocol_settings', array(
                'phone' => '',
                'address' => '',
                'city' => '',
                'country' => '',
                'hours' => 'Monday-Friday: 9:00-17:00',
                'founded' => '',
                'employees' => '',
                'industry' => '',
                'services' => ''
            ));
        }
    }
    
    public function deactivate() {
        flush_rewrite_rules();
    }
}

// Initialize the plugin
new AIR_Protocol();
?>