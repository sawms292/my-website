<?php
include 'connect.php';  // Include the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Protect against SQL injection
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Fetch the user data based on username
    $sql = "SELECT * FROM login WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password (assuming it's hashed)
        if (password_verify($password, $row['password'])) {
            // Start a session or set cookies, etc.
            session_start();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            echo "Login successful! Welcome, " . $row['username'];
            // Redirect to a secure page, e.g., dashboard
            header("Location: dashboard.php");
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "No user found with that username.";
    }
}
?>
