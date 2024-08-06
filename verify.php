<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Webboard Easy</h1></center>
    <hr>
    <div align="center">
        <?php
            $login = $_POST['username'];
            $pass = $_POST['password'];
            if ($login == 'admin' && $pass == 'ad1234'){
                echo "ยินดีต้อนรับคุณ ADMIN" ; }
            else if ($login == "member" && $pass =="mem1234"){
                echo "ยินดีต้อนรับคุณ MEMBER"; }
            else{ 
                echo "ชื่อบัญชีหรือรหัสไม่ถูกต้อง"; 
            }
            echo"<BR><a href='index.php'>กลับไปยังหน้าหลัก</a>"
        ?>
    </div>
</body>
</html>