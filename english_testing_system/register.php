<!-- Register a new student account -->

<?php
    $_SESSION['email'] = $_POST['remail'];
    $_SESSION['first_name'] = $_POST['firstname'];
    $_SESSION['last_name'] = $_POST['lastname'];

    $first_name = $mysqli->escape_string($_POST['firstname']);
    $last_name = $mysqli->escape_string($_POST['lastname']);
    $email = $mysqli->escape_string($_POST['remail']);

    // $password = $mysqli->escape_string(password_hash($_POST['rpassword'], PASSWORD_BCRYPT));
    $password = $mysqli->escape_string($_POST['rpassword']);
    $hash = $mysqli->escape_string(md5(rand(0,1000)));
    
    $result = $mysqli->query("SELECT * FROM user WHERE user_email='$email'") or die($mysqli->error());

    if ($result->num_rows > 0)
    {
        $_SESSION['message'] = '<div class="info-alert">User with this email already exists!</div>';
        header("location: error.php");
    }
    else
    {
        $sql = "INSERT INTO user (user_first_name, user_last_name, user_email, user_password, user_hash)" 
            ."VALUES ('$first_name','$last_name','$email','$password', '$hash')";

        if ($mysqli->query($sql))
        {
            $result = $mysqli->query("SELECT * FROM user WHERE user_email='$email'");
            $user = $result->fetch_assoc();
            $id = $user['user_id'];

            $_SESSION['user_email_verified'] = "yes";
            $_SESSION['logged_in'] = true;

            $mysqli->query("UPDATE user SET user_email_verified='yes' WHERE user_id='$id'") or die($mysqli->error);

            header("location: success.php");

            if ($_SESSION['email'] == 'admin@admin.com')
            {
                header("location: admin.php");
            }
        }
        else
        {
            $_SESSION['message'] = '<div class="info-alert">Registration failed!</div>';
            header("location: error.php");
        }
    }
?>