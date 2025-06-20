<?php
require_once 'classes/class-jsonfetcher.php';
require_once 'classes/class-cart.php';
require_once 'config/index.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

try {

    $cart = new Cart(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $method = $_SERVER['REQUEST_METHOD'];
    $needsApiCall = true;
    $inputData = [];
    $result = [];
    
    if ($method === 'POST') {
        $rawInput = file_get_contents("php://input");
        $inputData = json_decode($rawInput, true) ?? [];
        
    } elseif ($method === 'GET') {
        $inputData = $_GET;
    }


    switch($inputData['action']) {
        case 'fetch-places': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/misc/place-autocomplete';
            break;
        }
        case 'get-coordinates': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/misc/address-recommend';
            break;
        }
         case 'fetch-restaurants': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/restaurants/list/v5';
            $inputData['lat'] = $inputData['lat'] ?? '';
            $inputData['lng'] = $inputData['lng'] ?? '';
            $inputData['page_type'] = 'DESKTOP_WEB_LISTING';
            $inputData['limit'] = 20;
            break;
        }
        case 'fetch-more-restaurants': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/restaurants/list/update';
            $inputData['lat'] = $inputData['lat'] ?? '';
            $inputData['lng'] = $inputData['lng'] ?? '';
            $inputData['page_type'] = 'DESKTOP_WEB_LISTING';
            $inputData['offset'] = $inputData['offset'] ?? '';
            $inputData['widgetOffset'] = $inputData['widgetOffset'] ?? '';
            $inputData['limit'] = 20;
            break;
        }
        case 'fetch-menu': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/menu/pl';
            break; 
        }
        case 'fetch-menu-search': {
            $inputData['url'] = 'https://www.swiggy.com/dapi/menu/pl/search';
            break; 
        }
        case 'checkin': {
            $result =  $cart->saveCheckoutDetails(
                $inputData['fullname'] ?? '',
                $inputData['email'] ?? '',
                $inputData['phone'] ?? '',
                $inputData['home'] ?? '',
                $inputData['road'] ?? '',
                $inputData['saveas'] ?? ''
            );
            $needsApiCall = false;
            break;
        }
        default:
             throw new Exception("Missing 'action' parameter");
            break;
    }
   
    if ($needsApiCall) {
   //      $url = $server_urls[array_rand($server_urls)].'/server.php';

        // File to store the last index
        $indexFile = __DIR__ . '/rotate-index.txt';

        // Read last index, default -1 if file not found
       $lastIndex = file_exists($indexFile) ? (int) file_get_contents($indexFile) : -1;

        // Calculate next index
        $nextIndex = ($lastIndex + 1) % count($server_urls);

        // Save it for next request
        file_put_contents($indexFile, $nextIndex);

        // Use selected proxy
        $url = $server_urls[$nextIndex] . '/server.php';

        file_put_contents("debug.log", "Proxy used: $url\n", FILE_APPEND);

        // added to check ramdonmess
        // error_log("Selected Proxy URL: " . $url);
        file_put_contents("debug.log", "Proxy used: $url\n", FILE_APPEND);
        $fetcher = new JsonFetcher($url, $method, $inputData, ['_guest_tid'=> 'dasdass']);
        $result = $fetcher->fetch();
        $result = $result['data'];
       
    }

    echo json_encode($result, JSON_PRETTY_PRINT);
    
    
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage(),
        "data" => null
    ]);
}

// Load existing counts
$countFile = __DIR__ . '/proxy-count.json';
$proxyCounts = file_exists($countFile) ? json_decode(file_get_contents($countFile), true) : [];

$status = [];

foreach($server_urls as $server_url):
    $url = $server_url . '/server.php';
    $fetcher = new JsonFetcher($url, 'GET', ['action' => 'server-status']);
    $result = $fetcher->fetch();

    if (!isset($proxyCounts[$server_url])) $proxyCounts[$server_url] = 0;

    if (array_key_exists('success', $result) && $result['success'] == true) {
        $status[$server_url] = 'online';
        $proxyCounts[$server_url]++;
    } else {
        $status[$server_url] = 'offline';
    }
endforeach;

// Save back updated counts
file_put_contents($countFile, json_encode($proxyCounts, JSON_PRETTY_PRINT));
