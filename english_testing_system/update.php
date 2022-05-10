<!-- Update student profile -->

<?php
include ("header.php"); 
include_once ("class/class.php");

?>

<?php 
    require 'db.php';

    if (isset($_SESSION['logged_in']) != 1)
    {
        header("Location: index.php");
    }

    if (isset($_POST['update']) && $_POST['new_first_name'] != "" && $_POST['new_last_name'] != "" && $_POST['current_password'] != "") 
    {
        $new_first_name = $mysqli->escape_string($_POST['new_first_name']);
        $new_last_name = $mysqli->escape_string($_POST['new_last_name']);
        $current_password = $mysqli->escape_string($_POST['current_password']);
        $email = $_SESSION['email'];

        $result = $mysqli->query("SELECT user_password FROM user WHERE user_email='$email'");

        $user = $result->fetch_assoc();
        $password = $user['user_password'];

        // if (password_verify($_POST['current_password'], $user['user_password']))
        if ($_POST['current_password'] == $user['user_password'])
        {
            $sql = ("UPDATE user SET user_first_name='$new_first_name', user_last_name='$new_last_name' WHERE user_email='$email'");
            
            if($mysqli->query($sql))
            {
                $_SESSION['message'] = "<div class='info-success'>Profile updated successfully</div>";
                header("Location: success.php");
            }
            else
            {
                $_SESSION['message'] = "<div class='info-alert'>Profile not updated!</div>";
                header("Location: error.php");
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
    <meta charset="UTF-8">
    <title>Update Personal Details</title>

    <script src="js/validation.js" type="text/javascript"></script>
</head>

<body>
    <div class="main">
        <div class="center vertical">
        <h1>Update Personal Details</h1>

        <div id="update profile">  
            <form id="updateform" name="updateform" onsubmit="return update_validation();" method="post" autocomplete="off">

            <div class="center">
                <table style="margin-left:auto; margin-right:auto; width:300px;">

                    <tr><td>
                    <label for="new_first_name">new first name<span class="req">*</span></label>
                    <td/><tr/>
                    <tr><td>
                    <input type="text" autocomplete="off" name="new_first_name" id="new_first_name" style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                    <td/><tr/>          

                    <tr><td>
                    <label for="new_last_name">new last name<span class="req">*</span></label>
                    <td/><tr/>
                    <tr><td> 
                    <input type="text" autocomplete="off" name="new_last_name" id="new_last_name" style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                    <td/><tr/>

                    <tr><td>
                    <label for="current_password">current password<span class="req">*</span></label>
                    <td/><tr/>
                    <tr><td> 
                    <input type="password" autocomplete="off" name='current_password' id='current_password' style="border-style:solid; border-width: 4px; border-color:#ddd; "/>
                    <td/><tr/>

                </table>

                <span id="update_message"></span>
                <button type="submit" class="button" name="update" id="update" />CONFIRM</button>

                </div>
            </form>
        </div>
        </div>
    </div>



<?php
include ("footer.php"); 
?>
