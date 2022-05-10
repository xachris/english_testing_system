<!-- Provide contact info for users who forget their password -->

<?php
include ("header.php"); 
?>


<link rel="stylesheet" href="css/test.css">

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password?</title>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>

<div class="main">

        <div class="center vertical">

        <h2>Forgot your password?</h2>
        <p>Please email us at 2397984@dundee.ac.uk for help.</p>

        <button class="button" onclick="goBack();" />Back</button>
        <a href="index.php"><button class="button"/>Home</button></a>

        </div>
</div>

<?php
include ("footer.php"); 
?>