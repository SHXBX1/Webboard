<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webboard Suisei</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function myfunction() {
            let c = confirm("ต้องการลบกระทู้นี้หรือไม่");
            return c;
        }
    </script>
</head>
<body>
    <div class="container-lg">
        <h1 style="text-align: center;" class="mt-3">Shxbx Webboard</h1>
        <nav class="navbar navbar-expand-lg" style="background-color: #d3d3d3;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><i class="bi bi-house-door-fill"></i>Home</a>
                    <ul class="navbar-nav">
                        <?php 
                            if(!isset($_SESSION['id'])){
                                echo "<li class='nav-item'>
                                        <a class='nav-link' href='login.php'><i class='bi bi-pencil-square'></i>เข้าสู่ระบบ</a>
                                    </li>";
                            }else{
                                echo "<li class='nav-item dropdown'>
                                        <a class='btn btn-outline-secondary btn-sm dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <i class='bi bi-person-lines-fill'></i>$_SESSION[username]
                                        </a>
                                        <ul class='dropdown-menu'>
                                                <li><a class='dropdown-item' href='logout.php'><i class='bi bi-power'></i>ออกจากระบบ</a></li>
                                        </ul>
                                    </li>";
                            }
                        ?>
                    </ul>
            </div>
        </nav>
        <div class="dropdown mt-3">
            <label>หมวดหมู่</label>
            <a class="btn btn-light btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            --ทั้งหมด--
            </a>
            <ul class="dropdown-menu" aria-labelledby="Button2">
                <li><a href="#" class=" dropdown-item"></a></li>
                <?php
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    $sql = "SELECT * FROM category";
                    foreach($conn->query($sql) as $row){
                        echo "<li><a href=# class=' dropdown-item'>$row[name]</a></li>";
                    }
                    $conn=null;
                ?>
            </ul>
            <span class="d-inline-flex gap-1" style="float: right;">
                <?php 
                    if(isset($_SESSION['id'])){
                        echo "<a class='btn btn-success' href='newpost.php' role='button'><i class='bi bi-plus'></i>สร้างกระทู้ใหม่</a>";
                    }
                ?>
            </span>
        </div>
        <br>
        <table class="table table-striped">
            <?php
                $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                $sql = "SELECT t3.name,t1.title,t1.id,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id)
                INNER JOIN category as t3 ON (t1.cat_id=t3.id) ORDER BY t1.post_date DESC";
                $result = $conn->query($sql);
                while($row = $result->fetch()){
                    echo "<tr><td>[ $row[0] ]<a href=post.php?id=$row[2] style=text-decoration:none> $row[1]</a>";
                    if(isset($_SESSION['id'])&& $_SESSION['role']=='a'){
                        echo "<a onclick='return myfunction()' class='btn btn-danger' style='float:right' role='button' href=delete.php?id=$row[2]><i class='bi bi-trash'></i></a>";
                    }
                    echo"<br>$row[3] - $row[4]</td></tr>";
                }
                $conn=null;
            ?>
        </table>
    </div>
</body>
</html>