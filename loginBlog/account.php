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
    <link rel="stylesheet" href="../css/homepage-navbar.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $userCek["user_username"]; ?> </title>
</head>
<body>
        <?php include "navbarWhite.php"; ?>


        <div class="header">
            <div class="header-container">
                <form action="../admin/process.php" method="POST">

                <div class="formGroup">
                    <input placeholder="Kullanıcı Adı" type="text" name="user_username" id="" value="<?php echo $userCek["user_username"] ?> " >
                </div>                

                <div class="formGroup">
                    <input placeholder="Ad Soyad" type="text" name="user_name" id="" value="<?php echo $userCek["user_name"] ?> ">
                </div>

                <div class="formGroup">
                    <input placeholder="Email" disabled type="email" name="user_mail" id="" value="<?php echo $userCek["user_mail"] ?> ">
                </div>

                <div class="formGroup">
                    <input placeholder="Telefon" type="text" name="user_gsm" id="" value="<?php echo $userCek["user_gsm"] ?> ">
                </div>
                <input placeholder="id" type="hidden" name="user_id" id="" value="<?php echo $userCek["user_id"] ?> ">
                <div class="update">
                    <button class="d" name="userUpdate">Güncelle</button>
                </div>
            </form>


                <div class="logout">
                    <a href="../logout.php" >Çıkış Yap</a>
                </div>
                
            </div>
        </div>

</body>
</html>