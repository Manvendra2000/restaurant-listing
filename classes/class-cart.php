<?php

class Cart {
    private $conn;

    public function __construct($host, $user, $pass, $db) {
        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error) {
            die("DB connection failed: " . $this->conn->connect_error);
        }
    }

    public function saveCheckoutDetails($fullname, $email, $phone, $home, $road, $saveas) {
        session_start();
        // Validate essential fields
        if (empty($fullname) || empty($email) || empty($phone)) {
            http_response_code(400);
            return ["success" => false, "message" => "Missing required fields", "data" => "Missing required fields"];
        }
    
        // Step 1: Create new order in 'orders' table
        $order_name = 'ORD-' . strtoupper(bin2hex(random_bytes(4))) . '-' . preg_replace('/\s+/', '', $fullname);
        $stmt = $this->conn->prepare("INSERT INTO orders (name, order_total) VALUES (?, ?)");
        $stmt->bind_param("sd", $order_name, $_SESSION['cart-total']);
    
        if (!$stmt->execute()) {
            http_response_code(500);
            return ["success" => false, "message" => "Failed to create order", "error" => $stmt->error];
        }
    
        // Step 2: Get the inserted order ID
        $order_id = $stmt->insert_id;
        $stmt->close();
    
        // Step 3: Insert meta values
        $metaData = [
            'fullname' => $fullname,
            'email' => $email,
            'phone' => $phone,
            'home' => $home,
            'road' => $road,
            'saveas' => $saveas
        ];
    
        $stmt = $this->conn->prepare("INSERT INTO `order-meta` (order_id, meta_key, meta_value) VALUES (?, ?, ?)");
        foreach ($metaData as $key => $value) {
            $stmt->bind_param("iss", $order_id, $key, $value);
            if (!$stmt->execute()) {
                http_response_code(500);
                return ["success" => false, "message" => "Failed to save order meta", "error" => $stmt->error];
            }
        }
        $stmt->close();
    
        return ["success" => true, "message" => "Order saved successfully", "data" => ["order_id" => $order_id]];
    }
    

    public function getAllCheckouts() {
        $result = $this->conn->query("SELECT * FROM checkout_details ORDER BY created_at DESC");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return json_encode(["success" => true, "data" => $data]);
    }
}
