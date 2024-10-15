<?php
session_start();
if(isset($_SESSION['id'])){
    header("location:index.php");
    die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<script>
        function myfunction() {
            let w = warning("รหัสผ่านทั้งสองช่องไม่ตรงกัน");
            return w;
        }
    </script>
</head>
<body>
	<div class="container-lg">
    	<h1 style="text-align: center;" class="mt-3">Shxbx Webboard</h1>
    	<?php include "nav.php" ?>
		<div class="row mt-4">
		<div class="col-lg-3"></div>
		<div class="col-lg-6">
		<?php
			if(isset($_SESSION['add_login'])){
				if($_SESSION['add_login']=='error'){
					echo "<div class='alert alert-danger'>ชื่อบัญชีซ้ำหรือฐานข้อมูลมีปัญหา</div>";
				}
				else {
				echo "<div class='alert alert-success'>เพิ่มบัญชีเรียบร้อยแล้ว</div>";
				}
				unset($_SESSION['add_login']);
			}
		?>
		</div>
		<div class="row mt-2">
    		<div class="col-sm-10 col-md-8 col-lg-6 mx-auto">
				<div class="card border-primary">
					<form action="register_save.php" method="post">
					<h5 class="card-header bg-primary text-white">สมัครสมาชิก</h5>
					<div class="card-body">
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="login">ชื่อบัญชี:</label>
							<div class="col-lg-9">
								<input id="login" type="text" name="login" class="form-control" required>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="pwd">รหัสผ่าน:</label>
							<div class="col-lg-9">
								<input id="pwd" type="password" name="pwd" class="form-control" required>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="pwd2">ใส่รหัสผ่านซ้ำ:</label>
							<div class="col-lg-9">
								<input id="pwd2" type="password" name="pwd2" class="form-control" required>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="name">ชื่อ-นามสกุล:</label>
							<div class="col-lg-9">
								<input id="name" type="text" name="name" class="form-control" required>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="gender">เพศ:</label>
							<div class="col-lg-9">
								<div class="form-check">
									<input type="radio" name="gender" value="m" class="form-check-input" required>
									<label class="form-check-label">ชาย</label>
								</div>
								<div class="form-check">
									<input type="radio" name="gender" value="f" class="form-check-input" required>
									<label class="form-check-label">หญิง</label>
								</div>
								<div class="form-check">
									<input type="radio" name="gender" value="o" class="form-check-input" required>
									<label class="form-check-label">อื่นๆ</label>
								</div>
							</div>
						</div>
						<div class="row mb-3">
							<label class="col-lg-3 col-form-label" for="email">อีเมล:</label>
							<div class="col-lg-9">
								<input id="email" type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12 d-flex justify-content-center">
								<button type="submit" class="btn btn-primary btn-sm me-2">
									
									<i class="bi bi-save"></i> สมัครสมาชิก

									<!-- <a onclick='return myfunction()'><i class="bi bi-save"></i> สมัครสมาชิก</a> -->
								</button>
								<button type="reset" class="btn btn-danger btn-sm">
									<i class="bi bi-x-square"></i> ยกเลิก
								</button>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

		
</body>
</html>		