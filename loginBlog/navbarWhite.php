<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/navbarWhite.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <div class="navbar-container">
            <a href="">Bloggom</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="shareBlog.php">Bloglar</a>
            <a href="blogShare.php">Blog Paylaş</a>
            <a href="blogs.php">Bloglarım</a>
            <a href="account.php">Hesabım</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="">Hoşgeldin <?php echo $userCek["user_username"] ?> </a>
        </div>
    </div>
</body>
</html>