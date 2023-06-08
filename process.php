<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"] ?? "";
    $lastName = $_POST["lastName"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $repeatPassword = $_POST["repeatPassword"] ?? "";

    $users = [
        [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john.doe@example.com",
            "password" => "password123"
        ]
    ];

    $isValid = true;
    $error = "Registration successful";

    // check name
    if (empty($firstName) || strlen($firstName) < 2 || strlen($firstName) > 50) {
        $error = "Please enter a valid name.";
        $isValid = false;
    } elseif (empty($lastName) || strlen($lastName) < 2 || strlen($lastName) > 50) {
        $error = "Please enter a valid last name.";
        $isValid = false;
    } elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
        $isValid = false;
    } else {
        foreach ($users as $user) {
            if ($user["email"] === $email) {
                $error = "Email already exists.";
                $isValid = false;
                break;
            }
        }
    }

    if ($isValid) {
        if (empty($password) || strlen($password) < 6 || empty($repeatPassword) || $password != $repeatPassword) {
            $error = "Please enter a valid password.";
            $isValid = false;
        }
    }

    if (!$isValid) {
        echo "$error";
    } else {
        echo "Registration successful";
        // Log result to file
        

        // Add new user to array
        $newUser = [
            "id" => count($users) + 1,
            "name" => "$firstName $lastName",
            "email" => $email,
            "password" => $password
        ];
        $users[] = $newUser;
    }
    $data = $email ?? "Unknown user";
        $logMessage = "$error: $data \n";
        file_put_contents("log.txt", $logMessage, FILE_APPEND);
}
?>