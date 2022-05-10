<!-- Give error notification -->

<?php
include ("header.php"); 
include_once ("class/class.php");
?>


<link rel="stylesheet" href="css/test.css">



<!DOCTYPE html>
<html>
<head>

    <title>Error Message</title>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

</head>

<body>

    <div class="main">
        <div class="center vertical">
        <h1>Error Message</h1>

        <p>
        <?php 
            if (isset($_SESSION['message']) AND !empty($_SESSION['message']))
            { 
                echo $_SESSION['message'];
            }
        ?>
        </p>
        
        <button class="button" onclick="goBack();" />Back</button>
        <a href="index.php"><button class="button"/>Home</button></a>
        </div>     
    </div>


<?php
include ("footer.php"); 
?>