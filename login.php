<?php
session_start();

// Function to verify password hash
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read user credentials from file
    $file = 'users.txt';

    // Check if file exists and is readable
    if (file_exists($file) && is_readable($file)) {
        // Open file for reading
        $handle = fopen($file, 'r');

        // Iterate through each line in the file
        while (($line = fgets($handle)) !== false) {
            // Split line into username and hashed password
            list($storedUsername, $storedHashedPassword) = explode(':', $line, 2);

            // Remove trailing newline character from password
            $storedHashedPassword = rtrim($storedHashedPassword);

            // Check if username and password match
            if ($username === $storedUsername && verifyPassword($password, $storedHashedPassword)) {
                // Authentication successful, set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;

                // Redirect to secure page (e.g., developers only page)
                header('Location: secure-page.php');
                exit;
            }
        }

        // Close file handle
        fclose($handle);
    }

    // Authentication failed, redirect back to login page with error message
    header('Location: login.html?error=invalid_credentials');
    exit;
} else {
    // Redirect to login page if accessed directly without POST request
    header('Location: login.html');
    exit;
}
?>
