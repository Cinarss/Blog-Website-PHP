<?php 
ob_start();
session_start();
include "../loginBlog/access.php";


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
    
    <table id="customers">





<tr>
  <th>No</th>
  <th>Blod Başlığı</th>
  <th>Blog Konusu</th>
  <th></th>
</tr>

<?php 
  $say=0;
  while($blogcek=$blogsor->fetch(PDO::FETCH_ASSOC) ) { $say++; ?>


<tr>
    <td><?php echo $say?></td>
    <td><?php echo $blogcek["blog_title"]?></td>
    <td><?php echo $blogcek["blog_subject"]?></td>
   

    <td><center><a href="../admin/process.php?blog_id=<?php echo $blogcek["blog_id"]?>&adminBlogDelete=ok"><button class="btnDelete" >Sil</button></a></center></td>
  
</tr>

<?php }?>

</table>

</body>
</html>