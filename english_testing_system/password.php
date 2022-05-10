<!-- Reset password -->

<?php
include ("header.php"); 
include_once ("class/class.php");
?>

<?php 
    require 'db.php';

    if ($_SESSION['logged_in'] !=1 )
    {
        $_SESSION['message']="<div class='info-alert'>You must log in before changing your password!</div>";
        header("location: error.php"); 
    }

    if (isset($_POST['change']) && $_POST['new_password'] != "" && $_POST['confirm_new_password'] && $_POST['current_password'] != "")
    {   
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM user WHERE user_email='$email'");
        $user = $result->fetch_assoc();

        // if (password_verify($_POST['current_password'], $user['password']))
        if ($_POST['current_password'] == $user['user_password'])
        {
            // $new_password = $mysqli->escape_string(password_hash($_POST['new_password'], PASSWORD_BCRYPT));
            $new_password = $mysqli->escape_string($_POST['new_password']);

            $hash = $mysqli->escape_string(md5(rand(0,1000)));
            $sql = "UPDATE user SET user_password='$new_password', user_hash='$hash' WHERE user_email='$email'";

            if ($mysqli->query($sql))
            {
                $_SESSION['message'] = "<div class='info-success'>Your password has been changed successfully!</div>";
                header("location: success.php");    
            }
        }
        else
        {
            $_SESSION['message'] = "<div class='info-alert'>Please enter correct current password!</div>";
            header("Location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Your Password</title>
    <script src="js/validation.js" type="text/javascript"></script>
</head>
<body>
    <div class="main">
        <div class="center vertical">

        <h1>Change Your Password</h1>
        <form id="changeform" name="changeform" action="changepassword.php" onsubmit="return change_validation();" method="post">


            
        <div class="center">
            <table style="margin-left:auto; margin-right:auto; width:300px;">
                <tr><td>
                <label for="new_password">new password<span class="req">*</span></label>
                <td/><tr/>

                <tr><td>
                <input type="password" autocomplete="off" name="new_password" id="new_password" style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                <td/><tr/>            
            
            



                <tr><td>
                <label for="confirm_new_password">confirm new password<span class="req">*</span></label>
                <td/><tr/>

                <tr><td>  
                <input type="password" autocomplete="off" name="confirm_new_password" id="confirm_new_password" style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                <td/><tr/>

                <tr><td>
                <label for="current_password">current password<span class="req">*</span></label>
                <td/><tr/>

                <tr><td>
                <input type="password" autocomplete="off" name="current_password" id="current_password" style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                <td/><tr/>
            </table>            

            <span id="change_message"></span>
            <button class="button" name="change" id="change"/>CONFIRM</button>

        </div>
        </form>
    </div>
</div>



<?php
include ("footer.php"); 
?>
