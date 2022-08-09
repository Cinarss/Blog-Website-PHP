<?php
include "../admin/connect.php";
ob_start();
session_start();

include "access.php";



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage-navbar.css">
    <title>Blog Share</title>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<?php include "navbarWhite.php" ?>


<div class="header">
            <div class="header-container">
                <form action="../admin/process.php" method="POST">

                <div class="formGroup">
                    <input placeholder="Başlık" type="text" name="blog_title" id=""  >
                </div>                

                <div class="formGroup">
                    <input placeholder="Konu" type="text" name="blog_subject" id="" >
                </div>

                <!-- <div class="formGroup">
                    <input placeholder="Email"  type="email" name="user_mail" id="">
                </div> -->

                <div class="formGroup">
                    
                <textarea  name="blog_text" id="metin" class="ckeditor"></textarea>
                </div>
                <div class="update">
                    <button class="d" name="blogShare">Kaydet</button>
                </div>
            </form>


                <div class="logout">
                    <a href="../logout.php" >Çıkış Yap</a>
                </div>
                
            </div>
        </div>


</body>
</html>