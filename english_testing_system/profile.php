<!-- View user profile -->

<?php
include ("header.php"); 
?>


<?php
    require 'db.php';

    if ($_SESSION['logged_in'] != 1)
    {
        $_SESSION['message'] = "<div class='info-alert'>Please log in to use this website.</div>";
        header("location: error.php");    
    }
    else if ($_SESSION['email'] == 'admin@admin.com')
    {
        header("location: admin.php");
    }
    else
    {
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM `user` WHERE user_email='$email'");
        $user = $result->fetch_assoc();

        $first_name = $user['user_first_name'];
        $last_name = $user['user_last_name'];
        $email = $user['user_email'];
        $active = $user['is_active'];

    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Welcome <?= $first_name.' '.$last_name ?></title>
</head>


<body>
    <div class="main">
        <div class="center vertical">
        <h1>Welcome</h1>  

        <?php  
            if ($active == 1) {

                $_SESSION['message'] = '<p>Your account has been activated.<p>';

                echo $_SESSION['message'];
            }
            else {

                $_SESSION['message'] = '<p>Your account has not been activated. Please contact the administrator for help.<p>';

                echo $_SESSION['message'];
            }
        ?>
        
        <h2><?php echo $first_name.' '.$last_name; ?></h2>
        <p><?= $email ?></p>

        
            <?php
                if(isset($_SESSION['score'])){
            ?>
            <h2>Your score is: 

            <?php
                    echo $_SESSION['score'];
                }
            ?>
            </h2>        


        <a href="update.php"><button class="button button-block" name="update"/>Update Profile</button></a>
        <a href="password.php"><button class="button button-block" name="changepassword"/>Change Password</button></a>
        <a href="begin_test.php"><button class="button button-block" name="starttest" style="background: #fae196;"/>Begin Your Test</button></a>

    </div>
    </div>


<?php
include ("footer.php"); 
?>