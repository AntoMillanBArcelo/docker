<?php

    session_start();
        
    if (!isset($_SESSION['rol'])) 
    {
    header('location: login.php');
    }
    else 
    {
        if ($_SESSION['rol'] != 'c') 
        {
            header('location: login.php'); 
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>No Rango</h1>
</body>
</html>