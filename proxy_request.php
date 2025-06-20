<?php

function proxy_request($url, $payload = [], $method = 'POST') {
    $proxy_host = 'cac4946c4f194a58.shg.na.pyproxy.io';
    $proxy_port = '16666';
    $proxy_user = 'compressuser90-zone-dc';
    $proxy_pass = 'relianceus89';

    $ch = curl_init();

    if ($method === 'GET' && !empty($payload)) {
        $url .= '?' . http_build_query($payload);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Proxy settings
    curl_setopt($ch, CURLOPT_PROXY, "http://$proxy_host:$proxy_port");
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, "$proxy_user:$proxy_pass");

    // Request method
    if ($method === 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'User-Agent: Mozilla/5.0'
        ]);
    } else {
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'User-Agent: Mozilla/5.0'
        ]);
    }

    // Optional: skip SSL verification if needed
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = curl_error($ch);
        file_put_contents('proxy-error.log', $error . PHP_EOL, FILE_APPEND);
        curl_close($ch);
        return ['success' => false, 'error' => $error];
    }

    curl_close($ch);

    return json_decode($response, true);
}