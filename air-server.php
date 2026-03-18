<?php
/**
 * AIR Protocol Server Implementation
 * Simple PHP implementation for air.heger.it
 * 
 * Usage: Place this file as index.php in your web directory
 */

// CORS Headers for browser access
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Set JSON content type
header('Content-Type: application/json; charset=utf-8');

// Add AIR version header
header('AIR-Version: 0.1.0');

// Cache for 1 hour
header('Cache-Control: public, max-age=3600');

// Get query parameters
$params = $_GET;

// Load business data (in production, this could come from database)
$businessData = json_decode(file_get_contents(__DIR__ . '/business-data.json'), true);

// Determine what to return based on parameters
if (empty($params)) {
    // Discovery endpoint - no parameters
    respondWith($businessData['discovery']);
    
} elseif (isset($params['contact'])) {
    respondWith($businessData['contact']);
    
} elseif (isset($params['services'])) {
    if ($params['services'] === '' || $params['services'] === '1') {
        // All services
        respondWith($businessData['services']);
    } else {
        // Filtered services
        $keyword = strtolower($params['services']);
        $filtered = filterServices($businessData['services']['services'], $keyword);
        respondWith(['services' => $filtered]);
    }
    
} elseif (isset($params['geo'])) {
    respondWith($businessData['geo']);
    
} elseif (isset($params['availability'])) {
    respondWith($businessData['availability']);
    
} elseif (isset($params['credentials'])) {
    respondWith($businessData['credentials']);
    
} elseif (isset($params['all'])) {
    // Return everything except discovery
    $allData = array_merge(
        $businessData['contact'],
        $businessData['services'],
        $businessData['geo'],
        $businessData['availability'],
        $businessData['credentials']
    );
    respondWith($allData);
    
} else {
    // Unknown parameter
    http_response_code(400);
    respondWith([
        'error' => 'Bad Request',
        'message' => 'Unknown parameter. Supported: contact, services, geo, availability, credentials, all',
        'supported_params' => ['contact', 'services', 'geo', 'availability', 'credentials', 'all']
    ]);
}

function respondWith($data) {
    echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

function filterServices($services, $keyword) {
    return array_filter($services, function($service) use ($keyword) {
        // Search in name, description, category, and keywords
        $searchText = strtolower(
            $service['name'] . ' ' . 
            $service['description'] . ' ' . 
            $service['category'] . ' ' . 
            implode(' ', $service['keywords'])
        );
        
        return strpos($searchText, $keyword) !== false;
    });
}

// Error handling
function handleError($errno, $errstr, $errfile, $errline) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Internal Server Error',
        'message' => 'An error occurred while processing your request'
    ]);
    exit;
}

set_error_handler('handleError');
?>