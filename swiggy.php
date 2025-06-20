<?php
require_once 'classes/class-jsonfetcher.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

try {
    $method = $_SERVER['REQUEST_METHOD'];
    $inputData = [];
 
    if ($method === 'POST') {
        $rawInput = file_get_contents("php://input");
        $inputData = json_decode($rawInput, true) ?? [];
        
    } elseif ($method === 'GET') {
        $inputData = $_GET;
    }

    $url = $inputData['url'] ?? null;
    //var_dump($url);die;
    unset($inputData['url']);

    if (!$url) {
        throw new Exception("Missing 'url' parameter");
    }

    $fetcher = new JsonFetcher($url, $method, $inputData, ['_guest_tid'=> 'dasdass']);
    $result = $fetcher->fetch();
    
    echo json_encode($result, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => $e->getMessage(),
        "data" => null
    ]);
}
