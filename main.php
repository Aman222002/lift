<?php
// $con = new mysqli("localhost", "root", "", "user") or die("Connection failed: " . $con->connect_error);
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'user';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
if(isset($_POST['submit'])) {
    $username = $_POST['name'];
    $usernumber = $_POST['number'];
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];
    $confirmpassword = $_POST['confirmPassword'];
    $useraddress = $_POST['address'];
    
if ($userpassword == $confirmpassword) {
    try{
        $hashedPassword = password_hash($userpassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO `user_db`(`name`, `number`, `email`, `password`, `address`) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $usernumber, $useremail, $hashedPassword, $useraddress]);
     $response = [
        'status' => 'success',
        'message' => 'Registration successful',
        'redirect' => 'http://localhost/newproject/login.php'
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
} catch (PDOException $e) {
    $response = [
        'status' => 'error',
        'message' => 'Registration failed: ' . $e->getMessage()
    ];
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
} 
}
session_start();
error_reporting(0);
if(isset($_POST["b1"])) {
    $password = $_POST['inputPassword'];
    $email = $_POST['inputEmail'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM user_db WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $hashedPasswordFromDB = $row['password'];
            if (password_verify($password, $hashedPasswordFromDB)) {
                $_SESSION['name'] = $row["name"];
                $_SESSION['number'] = $row['number'];
                $_SESSION['password'] = $hashedPasswordFromDB;
                $_SESSION['email'] = $row["email"];
                $_SESSION['address'] = $row["address"];
                $_SESSION['loginStatus'] = 'ok';
                $response = [
                    'status' => 'success',
                    'message' => 'Login successful',
                    'redirect' => 'http://localhost/newproject/home.php'
                ];
                header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'Woops! Email or password is wrong.'
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'User not found'
            ];
        }
    } catch (PDOException $e) {
        $response = [
            'status' => 'error',
            'message' => 'Query error: ' . $e->getMessage()
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>
