<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (empty($name)) {
        $errors['name_error'] = "Name cannot be empty";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_error'] = "Invalid email format";
    }

    if ($password !== $confirm_password) {
        $errors['password_error'] = "Passwords do not match";
    }

    if (!empty($errors)) {
        $query_string = http_build_query($errors);
        header("Location: index.html?$query_string");
        exit();
    }

    echo "<h2>Form submitted successfully!</h2>";
    echo "<p>Name: " . htmlspecialchars($name) . "</p>";
    echo "<p>Email: " . htmlspecialchars($email) . "</p>";
}
?>
