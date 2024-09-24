<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <h1 style="text-align: center;">Webboard</h1>
    <?php
        if(isset($_SESSION['error'])&& S_SESSION['error']){
            echo "<div class='alert alert-danger mt-4 me-auto ms-auto' style='width:400px'>ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง</div>";
            unset($_SESSION['error']);
        }    
    ?>
    <form action="verify.php" method="post">
    <?php include "nav.php" ?>
    <div class="container-lg">
    <div class="card mt-4 me-auto ms-auto " style="width:18rem; background-color: #f8f4f4">
        <div class="card-header"> เข้าสู่ระบบ </div>
        <div class="cardbody">
            <div class="form-gruop">
                <lable for="login" class="form-lable">login: </lable>
                <lable id="login" type="text" class="form-control"></lable>
            </div>
            <div class="form-gruop">
                <lable for="pwd" class="form-lable">Password: </lable>
                <lable id="pwd" type="text" class="form-control"></lable>
            </div>
        <div>
            <button type="submit" class="btn btn-success btn-sm">Login</button>
            <button type="reset" class="btn btn-success btn-sm">Reset</button>
        </div>
        </div>
    </form>
    <br>
        </div>
    <div style="text-align: center;">
        ถ้ายังไม่ได้เป็นสมาชิก <a href="register.php">กรุณาสมัครสมาชิก</a>
    </div>
    </div>
</body>
</html>