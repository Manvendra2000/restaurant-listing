
<?php class JsonFetcher
{
    private string $url;
    private string $method;
    private array $data;
    private array $cookies;

    public function __construct(string $url, ?string $method = null, array $data = [], array $cookies = [])
    {
        $this->url = $url;
        $this->method = strtoupper($method ?? 'GET');
        $this->data = $data;
        $this->cookies = $cookies;
    }

    public function fetch(): array {
    $ch = curl_init();

    $headers = [
        "Content-Type: application/json",
        "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/119",
    ];

    if ($this->method === 'POST') {
        $headers[] = "Origin: https://www.swiggy.com";
    }

    // Add query parameters to URL if method is GET
    if ($this->method === 'GET' && !empty($this->data)) {
        $this->url .= (parse_url($this->url, PHP_URL_QUERY) ? '&' : '?') . http_build_query($this->data);
    }

    curl_setopt_array($ch, [
        CURLOPT_URL => $this->url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_CUSTOMREQUEST => $this->method,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_TIMEOUT => 20, // Optional: timeout to avoid hanging too long(was 20 initially, did 5)
    ]);

    // Send cookies if provided
    if (!empty($this->cookies)) {
        $cookieString = http_build_query($this->cookies, '', '; ');
        curl_setopt($ch, CURLOPT_COOKIE, $cookieString);
    }

    // Send POST data if method is POST
    if ($this->method === 'POST') {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
    }

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error) {
        return [
            "success" => false,
            "message" => "Unable to connect to server: $error",
            "data" => []
        ];
    }

    if ($httpCode !== 200) {
        return [
            "success" => false,
            "message" => "HTTP error code: $httpCode",
            "data" => []
        ];
    }

    $json = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return [
            "success" => false,
            "message" => "Invalid JSON: " . json_last_error_msg(),
            "data" => []
        ];
    }

    return [
        "success" => true,
        "message" => "Data fetched successfully",
        "data" => $json
    ];
    }
}
