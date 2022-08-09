<?php
ob_start();
session_start();
    include "../admin/connect.php";

    $usersor=$db->prepare("SELECT * from user where user_mail=:mail");
    $usersor->execute(array(
        "mail" => $_SESSION["user_mail"]
    ));

    $say=$usersor->rowCount();
    $usercek=$usersor->fetch(PDO::FETCH_ASSOC);

    if($say==0){
        Header("Location:login.php?izinsiz-giris-denemesi");
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/homepage-navbar.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <div class="menu-container">
            <a href="adminUsers.php">Kullanıcılar</a>
            <a href="adminBlogs.php">Bloglar</a>
            <a href="../logout.php">Çıkış Yap</a>
        </div>
    </div>
    
</body>
</html>