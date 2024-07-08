<?php
include '../includes/Dbh.php';

if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // error handlers
    // check if inputs are empty
    // check if email is valid

    // Check if the email already exists
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists.";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO users (email, pwd) VALUES ('$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            echo "Signup successful!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
