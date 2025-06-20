<?php
 //$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//var_dump($conn);die;


class UserAuth {
    private $conn;

    public function __construct($host, $user, $pass, $db) {
        $this->conn = new mysqli($host, $user, $pass, $db);
        if ($this->conn->connect_error) {
            die("DB connection failed: " . $this->conn->connect_error);
        }
    }

    public function signup($firstname, $lastname, $email, $phone, $country_code, $password) {
        $email = $this->conn->real_escape_string($email);

        $check = $this->conn->query("SELECT id FROM users WHERE email = '$email'");
        if ($check->num_rows > 0) {
            http_response_code(400);
            return json_encode(["success" => false, "message" => "Email already exists"]);
        }

        $hashed = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (firstname, lastname, email,  phone, countrycode, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstname, $lastname, $email, $phone, $country_code, $hashed);
        $stmt->execute();

        return json_encode(["success" => true, "message" => "Signup successful"]);
    }

    public function signin($email, $password) {
        $email = $this->conn->real_escape_string($email);
    
        // Start the session at the beginning
        session_start();
    
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return json_encode(["success" => false, "message" => "User not found"]);
        }
    
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            // Start the session and store user data in $_SESSION
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $user['role'];
    
            return json_encode([
                "success" => true,
                "message" => "Login successful",
                "user" => [
                    "id" => $user['id'],
                    "firstname" => $user['firstname'],
                    "lastname" => $user['lastname'],
                    "email" => $email,
                    "role" => $user['role']
                ]
            ]);
        } else {
            return json_encode(["success" => false, "message" => "Invalid password"]);
        }
    }

    public function clearDatabaseExceptAdmins() {
        // Delete all users except ADMINs
        $deleteUsers = $this->conn->query("DELETE FROM users WHERE role != 'ADMIN'");
        if (!$deleteUsers) {
            "Failed to delete non-admin users";
        }
    
        // Get list of all tables except 'users'
        $tablesResult = $this->conn->query("SHOW TABLES");
        if (!$tablesResult) {
            "Failed to fetch table list";
        }
    
        while ($row = $tablesResult->fetch_array()) {
            $table = $row[0];
            if ($table !== 'users') {
                $this->conn->query("TRUNCATE TABLE `$table`");
            }
        }
    
        return "Database cleared except admin users";
    }
    
    
}
