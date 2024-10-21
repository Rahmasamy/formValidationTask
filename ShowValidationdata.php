<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    if (!preg_match('/^[0-9]{5,20}$/', $mobile)) {
        exit("Error: Invalid mobile number.");
    } 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Error: Invalid email address.");
    } 
    echo "Mobile Number: " . htmlspecialchars($mobile) . "<br>";
    echo "Email: " . htmlspecialchars($email);
} else {
    exit("Invalid Request");
}
?>