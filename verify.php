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
	<meta charset="utf-8">
	<title>Verify</title>
</head>

<body>
	<?php
	$login = $_POST['username'];
	$passwd = $_POST['password'];

	$conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8", "root", "");
	$sql = "SELECT * FROM user where login='$login' and password=sha1('$pwd')";
	$result = $conn->query($sql);
	if ($result->rowCount() == 1) {
		$data = $result->fetch(PDO::FETCH_ASSOC);
		$S_SESSION['username'] = $data['login'];
		$S_SESSION['role'] = $data['role'];
		$S_SESSION['user_id'] = $data['id'];
		$S_SESSION['id'] = session_id();
		header("location:index.php");
		die();
	} else {
		$_SESSION['error'] = 'error';
		header("location:login.php");
		die();
	}
	$conn = null;
	?>
	</center>

</body>

</html>