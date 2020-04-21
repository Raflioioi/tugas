<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include "koneksi.php";

if(isset($_POST['login'])){ 
    $username=$_POST['username']; 
    $password=$_POST['password']; 

    $cekuser = mysqli_query($connection, "SELECT * FROM admin WHERE username = '$username' and password='$password'");
    $jumlah = mysqli_num_rows($cekuser);
    $hasil = mysqli_fetch_array($cekuser);
    if ($jumlah == 0) {
        echo "<script>alert('Username belum terdaftar!');history.go(-1);</script>";
    } else {
        
            $_SESSION['username'] = $hasil['nama'];
            header('location:admin.php');
        
    
    }
    // $query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
    // $result=mysql_query($query);
    // if (mysql_num_rows($result)) {
    //     $row=mysql_fetch_array($result);
    //     $_SESSION['login']=$row;
    //     //header("location: admin.php?view=dashboard");
    //     header("location: admin.php");        
    }else{
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <style>
            .formlogin{
                width : 500px;
                background-color: #99ccff;
                margin : 200px auto;
                padding : 20px;
                .logo{
                    width: 80px;
                    margin: 0 0;
                }
            }
        </style>
    </head>
    <body>
        <div class = "formlogin container">
            <h1>LOGIN ADMIN</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="LOGIN" name="login">
                    <input type="button" class="btn btn-secondary" value="REGISTER" name="register"v href="proses_register.php">
                </div>
            </form>
        </div>
    </body>
</html>
<?php 
    } 
?>