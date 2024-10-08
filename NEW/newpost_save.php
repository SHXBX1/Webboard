<?php
session_start();
    $TOP = $_POST['topic'];
    $COM = sha1($_POST['commnet']);
    $cat_id = $_POST['category'];
    $user_id = $_SESSION['user_id'];
    
    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
    $sql1 = "INSERT INTO post (title, content, post_date, cat_id, user_id) 
        VALUES('$TOP', '$COM',NOW(),'$cat_id','$user_id')";
        $conn->exec($sql1);
        $conn = null;
        header("location:index.php");
        die();
?>
