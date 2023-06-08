<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $users = [
        [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john.doe@example.com",
            "password" => "password123"
        ]
    ];
    
    $isValid = true;
    $error="none";
// check name

if (empty($firstName)) {
    $error = "Please enter a name.";
    $isValid = false;
} elseif (strlen($firstName) < 2 || strlen($firstName) > 50) {
    $error = "The name must contain from 2 to 50 characters.";
    $isValid = false;
} elseif (empty($lastName)) {
    $error = "Please enter your last name.<br>";
    $isValid = false;
} elseif (strlen($lastName) < 2 || strlen($lastName) > 50) {
    $error = "The last name must contain from 2 to 50 characters.";
    $isValid = false;
} elseif (empty($email)) {
    $error = "Please enter your email address.";
    $isValid = false;
    $data="Unknown user";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Please enter the correct email address";
    $data="Unknown user";
    $isValid = false;
} else {
    $data=$email;
    foreach ($users as $user) {
        if ($user["email"] === $email) {
            $error = "Email already exists.";
            $isValid = false;
            break;
        }
    }
}

if ($isValid) {
    if (empty($password)) {
        $error = "Please enter your password.";
        $isValid = false;
    } elseif (strlen($password) < 6) {
        $error = "The password must contain at least 6 characters.";
        $isValid = false;
    } elseif (empty($repeatPassword)) {
        $error = "Please retry the password.";
        $isValid = false;
    } elseif ($password != $repeatPassword) {
        $error = "Passwords do not match.";
        $isValid = false;
    }
}
if (!$isValid) {
    echo "$error"; 
   
}   else {
    echo "Registration successful"; }

    // Log result to file
 
  
    file_put_contents("log.txt", "$error: $data \n", FILE_APPEND);

    // Add new user to array
    $newUser = [
        "id" => count($users) + 1,
        "name" => "$firstName $lastName",
        "email" => $email,
        "password" => $password
    ];
    array_push($users, $newUser);
    
}
?>