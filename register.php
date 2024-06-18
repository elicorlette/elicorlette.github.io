<?php
// Function to generate hashed password
function generateHashedPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = generateHashedPassword($password);

    // Example: Save username and hashed password to a text file
    $file = 'users.txt';
    // Append new user data to file
    file_put_contents($file, "$username:$hashedPassword\n", FILE_APPEND);

    // Redirect to login page after successful registration
    header('Location: login.html');
    exit;
}
?>
