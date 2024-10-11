<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Post</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
	<h1 align="center">Webboard</h1>
	<hr>
	<center>
		<?php
		if ($_GET['id'] % 2 == 0) {
			echo 'ต้องการดูกระทู้หมายเลข ' . $_GET['id'] . "<br>";
			echo 'เป็นกระทู้หมายเลขคู่';
		} else {
			echo 'ต้องการดูกระทู้หมายเลข ' . $_GET['id'] . "<br>";
			echo 'เป็นกระทู้หมายเลขคี่';
		}
		?>
	</center>
	<br>
	<?php
	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
	$sql = "SELECT t1.title,t1.content,t2.login,t1.post_date FROM post as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) ORDER BY t1.post_date DESC";
	$result = $conn->query($sql);
	while ($row = $result->fetch()) {
		$head = $row[0];
		$content = "$row[1]<BR>$row[2] - $row[3]";
	}
	$conn = null;
	?>

	
<div class="container "style="max-width: 60rem;">
	<div class=" card text-dark bg-white border-info mt-4 m-auto">
		<div class=" card-header bg-primary text-white"> <?php echo"$head" ?></div>
		<div class="card-body"><?php echo "$content" ?></div>
	</div>

	<?php
	$i=0;
	$conn1 = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
	$sql1 = "SELECT t1.content,t2.login,t1.post_date FROM comment as t1 INNER JOIN user as t2 ON (t1.user_id=t2.id) ORDER BY t1.post_date";
	$result1 = $conn1->query($sql1);
	while ($row = $result1->fetch()) {
		$i++;
		$comment = "$row[0]<BR>$row[1] - $row[2]";
		echo"<div class=' card text-dark bg-white border-info mt-4 m-auto'>
		<div class=' card-header bg-info text-white'> ความคิดเห็นที $i </div>
		<div class='card-body'>$comment</div>
	</div>";
	}
	$conn = null;
	?>
	
	<div class="card text-dark bg-white border-success mt-4 m-auto">
		<div class="card-header bg-success text-white">แสดงความคิดเห็น</div>
		<div class="card-body">
			<form action="post_save.php" method="post">
				<input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
					<div class="row mb-3 justify-content-center">
						<div class="col-lg-10">
							<textarea name="comment" class="form-control" row="8"></textarea>
							</div>
						</div>
					<div class="row">
						<div class="col-lg-12">
							<center>
								<button type="submit" class="btn btn-success byn-sm text-white">
									<i class="bi bi-box-arrow-up-right me-1"></i></i>ส่งข้อความ
								</button>
							</center>
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
		<div align="center"><a href="index.php">กลับไปหน้าหลัก</a></div>

</body>

</html>