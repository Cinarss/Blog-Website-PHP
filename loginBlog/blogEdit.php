<?php
include "../admin/connect.php";
ob_start();
session_start();

include "access.php";

$blogsor=$db->prepare("SELECT * FROM blog_share where blog_id=:id");
$blogsor->execute(array(
  'id' => $_GET['blog_id']
  ));
$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);



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
                    <input placeholder="Başlık" type="text" name="blog_title" id="" value="<?php echo $blogcek["blog_title"]?>" >
                </div>                

                <div class="formGroup">
                    <input placeholder="Konu" type="text" name="blog_subject" id="" value="<?php echo $blogcek["blog_subject"]?>">
                </div>

                <div class="formGroup">
                    <select id="heard" class="form-control" name="blog_status" required>



             

                    <?php echo $blogcek['blog_status'] == '1' ? 'selected=""' : ''; ?>

                 




                  <option value="1" <?php echo $blogcek['blog_status'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($blogcek['blog_status']==0) { echo 'selected=""'; } ?>>Pasif</option>
                  <!-- <?php 

                   if ($blogcek['blog_status']==0) {?>


                   <option value="0">Pasif</option>
                   <option value="1">Aktif</option>


                   <?php } else {?>

                   <option value="1">Aktif</option>
                   <option value="0">Pasif</option>

                   <?php  }

                   ?>--> 


                 </select>
                    
                </div> 
                <input type="hidden" name="blog_id" value="<?php echo $blogcek["blog_id"]; ?>">
                <div class="formGroup">
                    
                <textarea  name="blog_text" id="metin" class="ckeditor"><?php echo $blogcek["blog_text"]; ?></textarea>
                </div>
                <div class="update">
                    <button class="d" name="blogUpdate">Güncelle</button>
                </div>


                

            </form>


                
                
            </div>
        </div>


</body>
</html>