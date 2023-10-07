
<?php

require 'funct/function.php';

if ( isset ($_POST["register"])){
    if(register($_POST) > 0){
        echo "<script> alert('userbaru berhasil ditambahkan');</script>";
        
    }else{
        ;
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>
<?php include 'template/header.php';?>
<?php include 'template/menu.php';?>
<div class="column right">
    <h3 class="center">Register !</h3><hr>
    <form action="" method="post" class="center" >
    <input placeholder=" Username" class="inpdata" type="text" name="username" id="" required>
    <input placeholder=" Password" class="inpdata" type="password" name="password" id="" required>
    <input placeholder=" Re-enter Password" class="inpdata" type="password" name="password2" id="">
    <input type="hidden" name="tgl">
    <button class="btn" name="register">Register Now !</button>
</form>
</div>
<?php include 'template/footer.php';?>
</body>
</html>