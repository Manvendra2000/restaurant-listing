<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Get parameters from request
$offset = isset($_POST['offset']) ? $_POST['offset'] : '';
$csrfToken = isset($_POST['csrfToken']) ? $_POST['csrfToken'] : null;

// Prepare request data
$data = [
    'lat' => '28.6139',
    'lng' => '77.2090',
    'page_type' => 'DESKTOP_WEB_LISTING',
    'offset' => $offset,
    'widgetOffset' => [
        'NewListingView_category_bar_chicletranking_TwoRows' => '',
        'NewListingView_category_bar_chicletranking_TwoRows_Rendition' => '',
        'Restaurant_Group_WebView_PB_Theme' => '',
        'Restaurant_Group_WebView_SEO_PB_Theme' => '',
        'collectionV5RestaurantListWidget_SimRestoRelevance_food_seo' => $offset ?: '',
        'inlineFacetFilter' => '',
        'restaurantCountWidget' => ''
    ],
    'limit' => 20
];

// Prepare headers
$headers = [
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
    'Origin: https://www.swiggy.com',
    'Referer: https://www.swiggy.com/'
];

// Add CSRF token if available
if ($csrfToken) {
    $headers[] = 'x-csrf-token: ' . $csrfToken;
}

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.swiggy.com/dapi/restaurants/list/update');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

// Execute request
$response = curl_exec($ch);

// Handle errors
if (curl_errno($ch)) {
    echo json_encode([
        'statusCode' => -1,
        'error' => 'Curl error: ' . curl_error($ch)
    ]);
    curl_close($ch);
    exit;
}

// Get HTTP status
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Return the raw response
echo $response;
?>