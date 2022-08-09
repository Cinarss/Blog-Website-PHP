<?php
ob_start();
session_start();
include "../admin/connect.php";
include "access.php";


$blogsor=$db->prepare("SELECT * FROM blog_share where blog_seourl=:sef ");
$blogsor->execute(array(
    "sef" => $_GET["sef"]
));

$blogcek=$blogsor->fetch(PDO::FETCH_ASSOC);

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
<?php include "navbarWhite.php"; ?>

    <div class="headerBlog">
        <div class="header-containerBlog">
            <h1><?php echo $blogcek["blog_title"]; ?></h1>
            <h3><?php echo $blogcek["blog_subject"]; ?></h3>

            <p><?php echo $blogcek["blog_text"]; ?></p>
            <hr>
            <div class="bottom">
                <p> <?php echo $blogcek["blog_time"]; ?> </p>
                <p> <?php echo $userCek["user_name"]; ?> </p>
            </div>            
        </div>
    </div>
</body>
</html>