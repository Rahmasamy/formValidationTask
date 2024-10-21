<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");


function mobileValidation($mobile){
    if (!preg_match('/^[0-9]{5,20}$/', $mobile)) {
        return false;
    }
    return true;
}

function emailValidation($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mobile = filter_var($_POST['mobile'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $isMobileValid = mobileValidation($mobile);
    $isEmailValid = emailValidation($email);
    if($isMobileValid && $isEmailValid){
        echo "Mobile Number: " . htmlspecialchars($mobile) . "<br>";
        echo "Email: " . htmlspecialchars($email);
    } else {
        
        if (!$isMobileValid) {
            echo "Error: Invalid mobile number.";
        } elseif (!$isEmailValid) {
            echo "Error: Invalid email address.";
        }
    }
} else {
    exit("Invalid Request");
}
?>
