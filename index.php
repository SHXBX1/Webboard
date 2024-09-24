<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard</title>
    <!-- ติดตั้ง CDN bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <h1 style="text-align: center;" class="mt-3">Webboard</h1>
    <?php include "nav.php" ?>
    <div class="container-fluid ms-1 me-1">
    หมวดหมู่:    
            <a class="btn btn-outline-secondary btn-sm dropdown-toggle" role="button" data-bs-toggle="dropdown"> -- ทั้งหมด --</a>
            <ul class='dropdown-menu'>
            <li><a class='dropdown-item'> ทั้งหมด </a></li>
            <li><a class='dropdown-item'> เรื่องทั่วไป </a></li>
            <li><a class='dropdown-item'> เรื่องเรียน </a></li>
            </ul>
    <?php
        {
        if (isset($_SESSION['id'])){
            echo"<a class='btn btn-success btn-sm float-end' role='button' href='newpost.php'> + สร้างกระทู้ใหม่ </a>";
        }
        echo "<table class='table table-striped mt-4'>";
            for($i=1;$i<=10;$i=$i+1){
            echo "<tr><td><a href=post.php?id=$i style='text-decoration:none'>กระทู้ที่ $i</a>";
            if(isset($_SESSION['id']) && $_SESSION['role']=='a'){
                echo "<a class='btn btn-danger btn-sm float-end' role='button' href='delete.php?id=$i'><i class='bi bi-trash3-fill'></i></a>";
            }
            echo "</td></tr>";
            }
        echo"</table>";
        }
        ?>
    </div>
</body>
</html>