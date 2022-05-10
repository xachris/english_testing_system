<!-- Main entry of the program -->

<?php
include_once ("class/class.php");

?>


<?php 

    require 'db.php';
    session_start();

    if (isset($_SESSION['logged_in']) == 1){
        header("location: profile.php");
    }
    if (isset($_POST['login']) && $_POST['email'] != "" && $_POST['password'] != ""){
        require 'login.php';
    }
    elseif (isset($_POST['register']) && $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['remail'] != "" && $_POST['rpassword'] != ""){
        require 'register.php';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home English Test</title>
    <script src="js/validation.js" type="text/javascript"></script>    
    <script type = "text/javascript" src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/index.css">
</head>


<body style="background-color: #333; background-image: linear-gradient(to bottom right, #333, #a9a9a9);">

    <div class="form">
        <div class="tab-content">
            <div id="login" style="margin-bottom: 30px;">
                <h1 style="color: #fae196; font-size: 50px;">Home English Test</h1>
                <form id="loginform" name="loginform" onsubmit="return login_validation();" method="post" autocomplete="on">

                    <div class="field-wrap">
                    <label for="email">Email Address</label>  
                    <input type="text" autocomplete="off" name="email" id="email"/>
                    </div>

                    <div class="field-wrap">
                    <label for="password">Password</label>  
                    <input type="password" autocomplete="off" name="password" id="password"/>
                    </div>

                    <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
                    <span id="login_message"></span>

                    <button class="button button-block" name="login" id="login" style="background: #fae196;" />Log In</button>

                </form>

            </div>

            <hr class="horizontal">

 
            <div id="signup">
                <h1 style="font-size: 30px;">Create New Account</h1>
                <form id="registerform" name="registerform" onsubmit="return signup_validation();" method="post" autocomplete="on">

                <div class="top-row">
                    <div class="field-wrap">
                        <label for="firstname">First Name</label>
                        <input type="text" autocomplete="off" name='firstname' id='firstname'/>
                    </div>

                    <div class="field-wrap">
                        <label for="lastname">Last Name</label>
                        <input type="text" autocomplete="off" name='lastname' id='lastname'/>
                    </div>
                </div>

                    <div class="field-wrap">
                    <label for="email">Email Address</label>  
                    <input type="text" autocomplete="off" name="remail" id="remail"/>
                    </div>

                    <div class="field-wrap">
                    <label for="password">Password</label>  
                    <input type="password" autocomplete="off" name="rpassword" id="rpassword"/>
                    </div>

                    <span id="signup_message"></span>

                    <button type="submit" class="button button-block" name="register" id="register"/>Sign Up</button>

                </form>
            </div>
        </div>
    </div>


</body>
</html>
