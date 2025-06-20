<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

if ($_GET['url']) {
    $url = $_GET['url'];
} else {
    http_response_code(400);
    echo json_encode([
        "error" => "Invalid url"
    ]);
    exit;
}

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_HTTPHEADER => [
        "Accept: application/json, text/plain, */*",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
    ]
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // 🔥 Get HTTP status code
$error = curl_error($ch);

curl_close($ch);

// First: Check if cURL technical error
if ($error) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "cURL error: $error",
        "data" => null
    ]);
    exit;
}

// Second: Check HTTP status code (200 OK expected)
if ($httpCode !== 200) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "HTTP error code: $httpCode",
        "data" => $response // Send raw response (can be HTML error page)
    ]);
    exit;
}

// Third: Try decoding JSON
$json = json_decode($response, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Invalid JSON response",
        "data" => $response
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => "Data fetched successfully",
    "data" => $json
]);
?>