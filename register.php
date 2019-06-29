<?php
include 'Connection.php';

$conn = new Connection;


if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$data = array(
		':username' => $username,
		':password' => $password

	);
	$conn->update("INSERT INTO register(username,password) VALUES (:username,:password)",$data);

	echo "Registered";
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>register</title>
</head>
<body>
<a href="login.php">login</a>
	<form action="" method="POST">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="submit" name="submit" value="register">
	</form>

</body>
</html>
