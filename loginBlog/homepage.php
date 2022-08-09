<?php
ob_start();
session_start();
include "../admin/connect.php";

$userSor=$db->prepare("SELECT * FROM user where user_mail=:mail");
$userSor->execute(array(
    "mail" => $_SESSION["user_mail"]
));
$say=$userSor->rowCount();
$userCek=$userSor->fetch(PDO::FETCH_ASSOC);

if($say == 0){
    Header("Location:../login.php?durum=girisYapiniz");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/homepage.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>

    <?php include "navbarDark.php";?>

    <div class="header">
        <div class="header-container">
            <p>Blog oluşturmak  mı istiyorsun ?</p><br><br><br>
            <a href="blog-share.php">Hemen Oluştur</a>
        </div>
    </div>
</body>
</html>