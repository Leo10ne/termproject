<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register_view.inc.php';
require_once 'includes/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome</title>
</head>
<body>
<section>
    <?php
    check_signup_errors();
    ?>
    <h2>Signup Form</h2>
    <form action="includes/register.inc.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" name="signup" value="Signup">
    </form>
</section>
<section>
    <?php
    check_login_errors();
    ?>
    <h2>Login Form</h2>
    <form action="includes/login.inc.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" ><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" ><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</section>
</body>
</html>
