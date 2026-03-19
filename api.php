<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Cache-Control: public, max-age=3600');

// Read and parse data.md
$dataFile = __DIR__ . '/data.md';
if (!file_exists($dataFile)) {
    http_response_code(404);
    echo json_encode(['error' => 'Data file not found']);
    exit;
}

$markdown = file_get_contents($dataFile);
$data = parseMarkdownToArray($markdown);

// Handle query parameters
$query = $_GET;
if (empty($query)) {
    // Discovery endpoint
    $sections = array_keys($data);
    echo json_encode([
        'protocol' => 'AIR v1.0',
        'domain' => $_SERVER['HTTP_HOST'],
        'sections' => $sections,
        'endpoints' => array_map(function($section) {
            return 'https://' . $_SERVER['HTTP_HOST'] . '/?' . strtolower($section);
        }, $sections),
        'generated' => date('c')
    ]);
} else {
    // Specific section request
    $requestedSections = [];
    
    foreach ($query as $key => $value) {
        $sectionKey = ucfirst(strtolower($key));
        if (isset($data[$sectionKey])) {
            if ($value === '' || $value === '1' || $value === 'true') {
                // Return entire section
                $requestedSections[$sectionKey] = $data[$sectionKey];
            } else {
                // Filter by value (e.g., ?services=tomedo)
                $filtered = array_filter($data[$sectionKey], function($item) use ($value) {
                    return stripos($item, $value) !== false;
                });
                if (!empty($filtered)) {
                    $requestedSections[$sectionKey] = array_values($filtered);
                }
            }
        }
    }
    
    if (empty($requestedSections)) {
        http_response_code(404);
        echo json_encode(['error' => 'No matching sections found']);
    } else {
        echo json_encode($requestedSections);
    }
}

function parseMarkdownToArray($markdown) {
    $lines = explode("\n", $markdown);
    $data = [];
    $currentSection = null;
    
    foreach ($lines as $line) {
        $line = trim($line);
        
        if (preg_match('/^## (.+)$/', $line, $matches)) {
            $currentSection = trim($matches[1]);
            $data[$currentSection] = [];
        } elseif ($currentSection && preg_match('/^- (.+)$/', $line, $matches)) {
            $item = trim($matches[1]);
            // Parse key: value format
            if (strpos($item, ':') !== false) {
                list($key, $value) = explode(':', $item, 2);
                $data[$currentSection][trim($key)] = trim($value);
            } else {
                $data[$currentSection][] = $item;
            }
        }
    }
    
    return $data;
}
?>