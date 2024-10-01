<?php
session_start();
if (isset($_SESSION['id'])) {
	header("location:index.php");
	die();
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Register</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	</head>

<body>
	<h1 align="center">สมัครสมาชิก</h1>
	<?php include "nav.php" ?>
	<div class="container-lg">
		<div class="row mt-3">
        <div class="col-sm-8 col-md-6 col-lg-5 mx-auto">
			<div class="card mt-2">
				<h5 class="card-header text-bg-primary">เข้าสู่ระบบ</h5>
				<div class="card-body">
					<form action="register_save.php" method="post">
						<!-- user -->
						<div class="row mt-3">
							<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto"><label for="user" class="form-label">ชื่อบัญชี :</label></div>
							<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto"><input id="user" type="text" name="login" class="form-control" required></input></div>
						</div>
						<!-- pass -->
						<div class="row mt-3">
							<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto"><label for="pass" class="form-label">รหัสผ่าน :</label></div>
							<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto"><input id="pass" type="password" class="form-control" name="pwd" required></input></div>
						</div>
						<!-- name_sur -->
						<div class="row mt-3">
							<div class="col-sm-3 col-md-3 col-lg-3 mx-auto my-auto"><label for="name" class="form-label">ชื่อ-นามสกุล :</label></div>
							<div class="col-sm-9 col-md-9 col-lg-9 mx-auto my-auto"><input id="name" type="text" class="form-control" name="name" required></input></div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-3 col-md-3 col-lg-3 mx-auto "><div>เพศ: </div></div>
							<div class="col-sm-9 col-md-9 col-lg-9 mx-auto ">
							<input type="radio" name="gender" value="m" required> ชาย <br>
							<input type="radio" name="gender" value="f" required> หญิง <br>
							<input type="radio" name="gender" value="o" required> อื่นๆ </div>
						</div>
						<div class="row mt-3">
							<div class="col-sm-3 col-md-3 col-lg-3 mx-auto "><label for="mail" class="form-label">อีเมล :</label></div>
							<div class="col-sm-9 col-md-9 col-lg-9 mx-auto "><input id="mail" type="email" class="form-control" name="email" required></input><br>
							<button type="submut" class="btn btn-primary btn-sm">
							<i class="bi bi-cloud-download-fill"></i> สมัครสมาชิก
							</button></div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
		</div>
	</div>
		<br>
		<div align="center"><a href="index.php">กลับไปหน้าหลัก</a></div>
</body>

</html>