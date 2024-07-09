<?php

declare(strict_types=1);


function check_signup_errors(): void
{
    if (isset($_SESSION['errors_signup'])){
        echo "<br>";
        foreach ($_SESSION['errors_signup'] as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET['signup'] == 'success'){
        echo '<p class="form-success">Signup successful!</p>';
    }
}