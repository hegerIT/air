<?php
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="wrap">
    <h1>🤖 AIR Protocol Settings</h1>
    
    <div style="background: #e3f2fd; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h3>📡 Your AIR Endpoints</h3>
        <p><strong>Discovery:</strong> <a href="<?php echo home_url('/.well-known/air'); ?>" target="_blank"><?php echo home_url('/.well-known/air'); ?></a></p>
        <p><strong>API:</strong> <a href="<?php echo home_url('/air'); ?>" target="_blank"><?php echo home_url('/air'); ?></a></p>
        <p><strong>Validation:</strong> <a href="<?php echo AIR_PROTOCOL_PLUGIN_URL; ?>validator.html?url=<?php echo urlencode(home_url('/air')); ?>" target="_blank">Test Your Implementation</a></p>
    </div>

    <?php if (!str_starts_with($_SERVER['HTTP_HOST'], 'air.')): ?>
    <div style="background: #fff3cd; padding: 15px; border-radius: 5px; margin-bottom: 20px; border-left: 4px solid #ffc107;">
        <h3>💡 Recommended Setup</h3>
        <p>For optimal AI discovery, create a subdomain <strong>air.<?php echo $_SERVER['HTTP_HOST']; ?></strong> pointing to this WordPress installation.</p>
        <p>This follows the AIR protocol standard and improves discoverability by AI assistants.</p>
    </div>
    <?php endif; ?>

    <form method="post" action="">
        <?php wp_nonce_field('air_protocol_settings'); ?>
        
        <h2>📞 Contact Information</h2>
        <table class="form-table">
            <tr>
                <th scope="row">Phone</th>
                <td><input type="text" name="phone" value="<?php echo esc_attr($settings['phone'] ?? ''); ?>" class="regular-text" placeholder="+1-555-123-4567" /></td>
            </tr>
            <tr>
                <th scope="row">Address</th>
                <td><textarea name="address" rows="3" cols="50" placeholder="Street Address"><?php echo esc_textarea($settings['address'] ?? ''); ?></textarea></td>
            </tr>
            <tr>
                <th scope="row">City</th>
                <td><input type="text" name="city" value="<?php echo esc_attr($settings['city'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row">Country</th>
                <td><input type="text" name="country" value="<?php echo esc_attr($settings['country'] ?? ''); ?>" class="regular-text" /></td>
            </tr>
            <tr>
                <th scope="row">Business Hours</th>
                <td><textarea name="hours" rows="3" cols="50" placeholder="Monday-Friday: 9:00-17:00"><?php echo esc_textarea($settings['hours'] ?? 'Monday-Friday: 9:00-17:00'); ?></textarea></td>
            </tr>
        </table>

        <h2>🏢 Company Information</h2>
        <table class="form-table">
            <tr>
                <th scope="row">Founded</th>
                <td><input type="text" name="founded" value="<?php echo esc_attr($settings['founded'] ?? ''); ?>" class="regular-text" placeholder="2020" /></td>
            </tr>
            <tr>
                <th scope="row">Number of Employees</th>
                <td><input type="text" name="employees" value="<?php echo esc_attr($settings['employees'] ?? ''); ?>" class="regular-text" placeholder="10-50" /></td>
            </tr>
            <tr>
                <th scope="row">Industry</th>
                <td><input type="text" name="industry" value="<?php echo esc_attr($settings['industry'] ?? ''); ?>" class="regular-text" placeholder="Technology, Healthcare, etc." /></td>
            </tr>
        </table>

        <h2>🛠️ Services</h2>
        <table class="form-table">
            <tr>
                <th scope="row">Manual Services<br><small>One per line</small></th>
                <td>
                    <textarea name="services" rows="8" cols="50" placeholder="Web Development: Custom websites and applications&#10;SEO Services: Search engine optimization&#10;Consulting: Strategic technology advice"><?php echo esc_textarea($settings['services'] ?? ''); ?></textarea>
                    <?php if (post_type_exists('service')): ?>
                        <p><em>📋 Note: Services from your "Services" custom post type are automatically included.</em></p>
                    <?php endif; ?>
                    <?php if (class_exists('WooCommerce')): ?>
                        <p><em>🛒 Note: WooCommerce products are automatically included as services.</em></p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>

        <?php submit_button('Save AIR Settings'); ?>
    </form>

    <div style="margin-top: 40px; padding: 20px; background: #f9f9f9; border-radius: 5px;">
        <h3>🤖 How AI Assistants Will See Your Data</h3>
        
        <h4>Example Queries:</h4>
        <ul>
            <li><strong>Discovery:</strong> <code><?php echo home_url('/air'); ?></code></li>
            <li><strong>Contact Info:</strong> <code><?php echo home_url('/air?contact'); ?></code></li>
            <li><strong>Services:</strong> <code><?php echo home_url('/air?services'); ?></code></li>
            <li><strong>Location:</strong> <code><?php echo home_url('/air?location'); ?></code></li>
            <li><strong>Everything:</strong> <code><?php echo home_url('/air?all'); ?></code></li>
        </ul>

        <h4>Preview Current Data:</h4>
        <div style="background: #1e1e1e; color: #00ff00; padding: 15px; border-radius: 4px; font-family: monospace; max-height: 400px; overflow-y: auto;">
            <?php
            // Create temporary instance to get current data
            $temp_plugin = new AIR_Protocol();
            $current_data = $temp_plugin->get_air_data();
            echo htmlspecialchars(json_encode($current_data, JSON_PRETTY_PRINT));
            ?>
        </div>
    </div>

    <div style="margin-top: 20px; padding: 20px; background: #e8f5e8; border-radius: 5px;">
        <h3>📈 Next Steps</h3>
        <ol>
            <li><strong>Test your implementation:</strong> <a href="<?php echo AIR_PROTOCOL_PLUGIN_URL; ?>validator.html?url=<?php echo urlencode(home_url('/air')); ?>" target="_blank">Run Validator</a></li>
            <li><strong>Set up subdomain:</strong> Point <code>air.<?php echo $_SERVER['HTTP_HOST']; ?></code> to this WordPress installation</li>
            <li><strong>Monitor usage:</strong> Check your server logs for requests to <code>/air</code> endpoints</li>
            <li><strong>Keep data current:</strong> Update this information when your business details change</li>
        </ol>
        
        <p><strong>Learn more:</strong> <a href="https://github.com/hegerIT/air" target="_blank">AIR Protocol Documentation</a> | <a href="https://air.heger.it" target="_blank">Live Demo</a></p>
    </div>
</div>

<style>
.form-table th {
    width: 200px;
}
.notice {
    margin: 15px 0;
}
</style>