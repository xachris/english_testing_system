<!-- Verify login info -->

<?php

    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM `user` WHERE user_email='$email'");

    if ($_POST['email'] == 'admin@admin.com')
    {
        $admin = $result->fetch_assoc();        

        // if (password_verify($_POST['password'], $admin['admin_password']))  // 
        if ($_POST['password'] == $admin['user_password']) 
        {
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $_POST['email'];
            header("location: admin.php");
        }

        else
        {
            $_SESSION['message'] = "<div class='info-alert'>You have entered wrong password, try again!</div>";
            header("location: error.php");
        }
    }

    if ($result->num_rows == 0)
    {
        $_SESSION['message'] = "<div class='info-alert'>User with that email doesn't exist!</div>";
        header("location: error.php");
    }

    else
    {
        $user = $result->fetch_assoc();
         // if (password_verify($_POST['password'], $user['user_password'])) 
        if ($_POST['password'] == $user['user_password'])
        {    
            $_SESSION['email'] = $user['user_email'];
            $_SESSION['first_name'] = $user['user_first_name'];
            $_SESSION['last_name'] = $user['user_last_name'];
            $_SESSION['active'] = $user['user_email_verified'];

            $_SESSION['logged_in'] = true;
            header("location: profile.php");            
        }

        else if($_POST['email'] != 'admin@admin.com')
        {
            $_SESSION['message'] = "<div class='info-alert'>You have entered wrong password, try again!</div>";
            header("location: error.php");
        }
    }
?>