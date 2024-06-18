<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Example: Save to a text file (users.txt)
    $file = 'users.txt';
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $data = "$username:$hashedPassword\n";

    // Append to file
    if (file_put_contents($file, $data, FILE_APPEND) !== false) {
        header('Location: login.html'); // Redirect on successful registration
        exit;
    } else {
        echo "Failed to register. Please try again later.";
    }
} else {
    // Redirect if accessed directly without POST request
    header('Location: register.html');
    exit;
}
?>
