<?php
session_start();
require 'funct/function.php';

if ( isset( $_COOKIE['id']) && isset($_COOKIE['sex']) ){
  $id = $_COOKIE['id'];
  $sex= $_COOKIE['sex'];
  
  //ambil username berdasarkan id
    $result = mysqli_query($conn,"SELECT username FROM users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    //cek cookie dan username
    if( $sex === hash('sha256',$row['username'])){
        $_SESSION['login']= true; 
    }
}
//jika sudah login arahkan user ke halaman index
if (isset($_SESSION["login"])){
    header("Location:profile.php");
    exit;
}
//Login Start
if( isset ($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1){

        $row= mysqli_fetch_assoc($result);
        //cek password
       if ( password_verify($password,$row["password"])){
        $_SESSION["login"] = true ;
        //jika ceklis remmber me (menggunakan Cookie)
         if ( isset ($_POST['remember'])){
            //buat cookie
            
            setcookie('id',$row['id'],time()+60);
            setcookie('sex',hash('sha256',$row['username'] ),time()+60); 
         }
            header("Location:listdata.php"); 
            exit;
       }
    }
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login </title>
</head>
<body>
<?php include 'template/header.php';?>
<?php include 'template/menu.php';?>
<div class="column right">
    <h3 class=" center">Login !</h3><hr>
    <?php if(isset($error)):?>
<div class="center"><p>Password / username salah</p></div>
<?php endif; ?>
<form action="" method="post">
     <input class="inpdata center" type="text" placeholder=" username" name="username" id="">
     <input class="inpdata center" type="password" placeholder=" password" name="password" id="">
    <input class=" center" type="checkbox" name="remember" id=""> Remember me
    <div class="center"><button class="btn" name="submit">Login</button></div>
    
</form>
</div>
<?php include 'template/footer.php';?>
</body>
</html>