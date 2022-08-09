<?php
ob_start();
session_start();
include "../loginBlog/access.php";


$usersor=$db->prepare("SELECT * FROM user");
$usersor->execute();



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
  <th>Kayıt Zamanı</th>
  <th>Kullanıcı Adı</th>
  <th>Kullanıcı Mail</th>
  <th>Kullanıcı Şifre</th>
  <th>Kullanıcı Yetki</th>
  <th>Kullanıcı Durum</th>
  <th></th>
</tr>

<?php 
  $say=0;
  while($userCek=$usersor->fetch(PDO::FETCH_ASSOC) ) { $say++; ?>


<tr>
    <td><?php echo $say?></td>
    
    <td><?php echo $userCek["user_time"]?></td>
    <td><?php echo $userCek["user_name"]?></td>
    <td><?php echo $userCek["user_mail"]?></td>
    <td><?php echo $userCek["user_password"]?></td>
    <td><?php echo $userCek["user_access"]?></td>
    <td>
        <?php 

            if ($userCek['user_status']==1) {?>

            <button class="btnStatus">Aktif</button>
            <?php } else {?>

            <button class="btnDelete">Pasif</button>


<?php } ?>
    </td>
   

    <td><center><a href="../admin/process.php?user_id=<?php echo $userCek["user_id"]?>&adminUserDelete=ok"><button class="btnDelete" >Sil</button></a></center></td>
  
</tr>

<?php }?>

</table>


</body>
</html>