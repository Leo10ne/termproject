<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/register/register_view.inc.php';
require_once 'includes/login/login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Welcome</title>
</head>
<body>
<section>
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
                <input type="checkbox" class="toggle">
                <span class="slider"></span>
                <span class="card-side"></span>
                <div class="flip-card__inner">
                    <div class="flip-card__front">
                        <div class="title">Log in</div>
                        <?php
                        check_login_errors();
                        ?>
                        <form class="flip-card__form" action="includes/login/login.inc.php" method="POST">
                            <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                            <input class="flip-card__input" name="password" placeholder="Password" type="password"
                                   required>
                            <input class="flip-card__btn" type="submit" name="login" value="Let's go!">
                            <!--                            <button class="flip-card__btn" type="submit">Let`s go!</button>-->
                        </form>
                    </div>
                    <div class="flip-card__back">
                        <div class="title">Register</div>
                        <?php
                        check_signup_errors();
                        ?>
                        <form class="flip-card__form" action="includes/register/register.inc.php" method="POST"
                              id="registerForm">
                            <input class="flip-card__input" name="email" placeholder="Email" type="email" required>
                            <input class="flip-card__input" name="password" placeholder="Password" type="password"
                                   id="password" required>
                            <input class="flip-card__btn" type="submit" name="register" value="Confirm!">
                            <!--                            <button class="flip-card__btn" type="submit">Confirm!</button>-->
                        </form>

                    </div>
                </div>
            </label>
        </div>
    </div>
</section>
</body>
<script>
    // Add a submit event listener to the sign-up form to validate the password before submission
    document.addEventListener('DOMContentLoaded', function () {
        // Check if there are any signup errors on the page
        const signupErrors = document.querySelectorAll('.form-error');
        if (signupErrors.length > 0) {
            // If errors exist, flip to the register section
            const toggleCheckbox = document.querySelector('.toggle');
            if (toggleCheckbox) {
                toggleCheckbox.checked = true;
            }
            // Optional: Scroll to the first error message or the form
            signupErrors[0].scrollIntoView();
        }
        // Find all error elements
        const errorElements = document.querySelectorAll('.form-error');
        // Loop through each error element and display its content in an alert
        errorElements.forEach(function (element) {
            alert(element.textContent);
        });
        document.getElementById('registerForm').addEventListener('submit', function (event) {
            // Retrieve the value of the password input field
            let password = document.getElementById('password').value;
            // Check if the password meets the requirements: more than five characters and includes numbers
            if (password.length <= 5 || !/\d/.test(password)) {
                // Alert the user if the password does not meet the requirements
                alert('Password must be more than five characters and include numbers.');
                // Prevent the form from being submitted if the password does not meet the requirements
                event.preventDefault();
            }
        });
    });
</script>
</html>

