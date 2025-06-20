<?php
require_once 'config/index.php';
require_once 'classes/class-user-auth.php';
$auth = new UserAuth(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$data = json_decode(file_get_contents("php://input"), true);
if (!$data || !is_array($data)) {
    $data = $_GET;
}
$action = $data['action'] ?? '';
switch ($action) {
    case 'signup':
        echo $auth->signup(
            $data['firstname'] ?? '',
            $data['lastname'] ?? '',
            $data['email'] ?? '',
            $data['phone'] ?? '',
            $data['countryCode'] ?? '',
            $data['password'] ?? ''
        );
        break;

    case 'signin':
        echo $auth->signin(
            $data['email'] ?? '',
            $data['password'] ?? ''
        );
        break;
    case 'logout':
        session_start();
        session_unset(); // Unset all session variables
        session_destroy();
        echo json_encode(["success" => true, "message" => "Logged out successfully"]);
        break; 
    case 'clear_db':
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($_SESSION['role'] !== 'ADMIN') {
                echo  "Unauthorized";
                break;
        }
    echo $auth->clearDatabaseExceptAdmins();
    break;      

    default:
        echo json_encode(["success" => false, "message" => "Invalid action"]);
}
