<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to login page if not logged in
    header('Location: login.html');
    exit;
}

// User is logged in, display secure content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Page; Turn back if you won't belong.</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link your CSS file -->
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
            <nav>
                <ul class="navbar">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="hobbies.html">Hobbies</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li> <!-- Logout button -->
                </ul>
            </nav>
        </div>
    </header>

    <section class="main-content">
        <div class="container">
            <h2>Developers Only</h2>
            <p>This page contains content accessible only to logged-in users.</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Your Website. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
