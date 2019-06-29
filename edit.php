<?php
include 'Connection.php';

$conn = new Connection;
$getId = $_GET['id'];
$res = $conn->getAll("SELECT * FROM task WHERE id=$getId",null);

//update method
if(isset($_POST['submit'])){

	$task1 = $_POST['task1'];
	$task2 = $_POST['task2'];


	$data = array(
		':task1' => $task1,
		':task2' => $task2,

	);

	$conn->update("UPDATE task SET task1=:task1,task2=:task2 WHERE id=$getId",$data);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>edit</title>
</head>
<body>
<a href="index.php">index</a>
	<form action="" method="POST">
		<?php
			foreach($res as $r){
		?>
		<input type="text" name="task1" value="<?php echo $r['task1']; ?>">
		<input type="text" name="task2" value="<?php echo $r['task2']; ?>">

		<input type="submit" name="submit" value="Update">
		<?php
			}
		?>
	</form>

</body>
</html>
