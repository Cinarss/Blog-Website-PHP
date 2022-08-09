<?php

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