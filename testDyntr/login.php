<?php
session_start();
require_once 'DBC.php';

$db = Database::getInstance();
$conn = $db->getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $sql = "SELECT id, username, password FROM User WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: owned-list.php");
            exit;
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid username";
    }
}
?>
