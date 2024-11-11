<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);
    
    $errors = [];

    // Validasi Name
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }

    // Validasi Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validasi Message
    if (empty($message) || strlen($message) < 5) {
        $errors[] = "Message must be at least 5 characters long.";
    }

    // Jika tidak ada error, maka tampilkan data berhasil
    if (empty($errors)) {
        echo "<h2>Thank you, $name! Your message has been received.</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Message: $message</p>";
    } else {
        // Tampilkan error
        echo "<h2>Please fix the following errors:</h2>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>