<?php
ob_start();
session_start();

include "connect.php";
include "../loginBlog/function.php";

    /*Register Process*/ 

    if(isset($_POST["register"])){
        $userSave=$db->prepare("INSERT into user set
        user_username=:user_username,
        user_mail=:user_mail,
        user_password=:user_password
        
        ");

        $insert=$userSave->execute(array(
            "user_username" => $_POST["user_username"],
            "user_mail" => $_POST["user_mail"],
            "user_password" => $_POST["user_password"]
        ));


        if($insert){
            Header("Location:../loginBlog/homepage.php?durum=basarili");
        }
        else{
            Header("Location:../login.php?durum=basarisiz");
        }
    }

/*----------------------------------------------------------------------*/ 

/* Login Process*/ 

    if(isset($_POST["login"])){
        $user_mail = $_POST["user_mail"];
        $user_password = $_POST["user_password"];



        $userSor=$db->prepare("SELECT * from user where user_mail=:mail and user_password=:password");

        $userCek=$userSor->execute(array(
            "mail" => $user_mail,
            "password" => $user_password

        ));

        echo $say=$userSor->rowCount();


        if($say == 1){
            $_SESSION["user_mail"]=$user_mail;
            Header("Location:../loginBlog/homepage.php?durum=basarili");
            exit;

        }else{
            Header("Location:../login.php?durum=basarisiz");
            exit;
        }

    }

    /*---------------------------------------------*/ 
    /*User Update*/ 

    if(isset($_POST["userUpdate"])){
        
        $user_id = $_POST["user_id"];

        $userSor=$db->prepare("UPDATE user SET
        user_username=:user_username,
        user_name=:user_name,
        user_gsm=:user_gsm
        WHERE user_id={$_POST['user_id']}");

        $update=$userSor->execute(array(
            ltrim("user_username") => ltrim($_POST["user_username"]),
            "user_name" => ltrim($_POST["user_name"]),
            "user_gsm" => ltrim($_POST["user_gsm"])
        ));


        if($update){
            Header("Location:../loginBlog/account.php?user_id=$user_id&durum=ok");
        }
        else{
            Header("Location:../loginBlog/account.php?user_id=$user_id&durum=no");
        }
    }


    /*---------------------------------------------------------------------- */

    /*Blog Share*/ 
    
    if(isset($_POST["blogShare"])){

        $blog_seourl=seo($_POST['blog_title']);


        $blogShare=$db->prepare("INSERT into blog_share set
        blog_title=:blog_title,
        blog_subject=:blog_subject,
        blog_text=:blog_text,
        blog_seourl=:blog_seourl
        
        ");

        $insert = $blogShare->execute(array(
            "blog_title" => $_POST["blog_title"],
            "blog_subject" => $_POST["blog_subject"],
            "blog_text" => $_POST["blog_text"],
            "blog_seourl" => $blog_seourl
        ));

        if($insert){
            Header("Location:../loginBlog/blogs.php?status=okay");
        }else{
            Header("Location../loginBlog/blogShare.php?status=no");
        }
    }


    /*blog Delete */ 
    /*---------------------------------------------------------------- */

    if ($_GET['blogDelete']=="ok") {

        $sil=$db->prepare("DELETE from blog_share where blog_id=:id");
        $kontrol=$sil->execute(array(
            'id' => $_GET['blog_id']
            ));
    
    
        if ($kontrol) {
    
    
            Header("Location:../loginBlog/blogs.php?sil=ok");
    
    
        } else {
    
            Header("Location:../loginBlog/blogs.php?sil=no");
    
        }
    
    
    }


    if(isset($_POST["blogUpdate"])){
        $blog_id=$_POST["blog_id"];

        $blogsor=$db->prepare("UPDATE blog_share set 
        blog_title=:blog_title,
        blog_subject=:blog_subject,
        blog_status=:blog_status,
        blog_text=:blog_text


        WHERE blog_id={$_POST['blog_id']}");

        $update=$blogsor->execute(array(
            "blog_title" => $_POST["blog_title"],
            "blog_subject" => $_POST["blog_subject"],
            "blog_status" => $_POST["blog_status"],
            "blog_text" => $_POST["blog_text"]
        ));

        if($update){
            Header("Location:../loginBlog/blogEdit.php?status=okay&blog_id=$blog_id");
        }else{
            Header("Location:../loginBlog/blogEdit.php?status=no&blog_id=$blog_id");

        }
    }


    if(isset($_POST["adminlogin"])){
        $user_mail = $_POST["user_mail"];
        $user_password = $_POST["user_password"];

        $usersor=$db->prepare("SELECT * FROM user where user_mail=:mail and user_password=:password and user_access=:access");
        $usersor->execute(array(
            "mail" => $user_mail,
            "password" => $user_password,
            "access" => 5
           
            
        ));
        
        echo $say=$usersor->rowCount();

        if($say==1){
           $_SESSION["user_mail"] = $user_mail;
            Header("Location:../adminPanel/admin.php?durum=ok");
            exit;
        }else{
            Header("Location:../adminPanel/login.php?durum=accessdenied");
            exit;
        }
    }



    if ($_GET['adminBlogDelete']=="ok") {

        $sil=$db->prepare("DELETE from blog_share where blog_id=:id");
        $kontrol=$sil->execute(array(
            'id' => $_GET['blog_id']
            ));
    
    
        if ($kontrol) {
    
    
            Header("Location:../adminPanel/adminBlogs.php?sil=ok");
    
    
        } else {
    
            Header("Location:../adminPanel/adminBlogs.php?sil=no");
    
        }
    
    
    }

    if ($_GET['adminUserDelete']=="ok") {

        $sil=$db->prepare("DELETE from user where user_id=:id");
        $kontrol=$sil->execute(array(
            'id' => $_GET['user_id']
            ));
    
    
        if ($kontrol) {
    
    
            Header("Location:../adminPanel/adminUsers.php?sil=ok");
    
    
        } else {
    
            Header("Location:../adminPanel/adminUsers.php?sil=no");
    
        }
    
    
    }

?>