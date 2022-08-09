<?php 
ob_start();
session_start();
include "access.php";


$blogsor=$db->prepare("SELECT * FROM blog_share");
$blogsor->execute();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/homepage-navbar.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
</head>
<body>
    <?php include "navbarWhite.php"; ?>


    <div class="header">
    

<table id="customers">





  <tr>
    <th>No</th>
    <th>Blod Başlığı</th>
    <th>Blog Konusu</th>
    <th>Blog Durum</th>
    <th></th>
    <th></th>
  </tr>

  <?php 
    $say=0;
    while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC) ) { $say++; ?>


  <tr>
      <td><?php echo $say?></td>
      <td><?php echo $blogcek["blog_title"]?></td>
      <td><?php echo $blogcek["blog_subject"]?></td>
      <td>
      <?php 

            if ($blogcek['blog_status']==1) {?>

            <button class="btnStatus">Aktif</button>
            <?php } else {?>

            <button class="btnDelete">Pasif</button>


<?php } ?>

      </td>
      <td><center><a href="blogEdit.php?blog_id=<?php echo $blogcek["blog_id"]?>" ><button   class="btnEdit" >Düzenle</button></a></center></td>
      <td><center><a href="../admin/process.php?blog_id=<?php echo $blogcek["blog_id"]?>&blogDelete=ok"><button class="btnDelete" >Sil</button></a></center></td>
    
  </tr>

  <?php }?>
  
</table>
    </div>

</body>
</html>