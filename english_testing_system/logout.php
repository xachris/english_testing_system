<!-- Log out from the system -->

<?php
    session_start();
    session_unset();
    session_destroy(); 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>
    <div class="main">
        <?php
          	header("location: index.php");
        ?>
    </div>
</body>
</html>