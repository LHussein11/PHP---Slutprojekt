<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logga ut</title>
</head>
<body>
<?php include 'header.php'; ?>
<?php

session_start();
    if(isset($_SESSION['user'])){
        // Ta bort session
        session_destroy();
        header("Location: admin.php?=signup=success");
} 
?>
</body>
</html>