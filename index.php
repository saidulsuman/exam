<?php
session_start();
if(!isset($_SESSION['logged_id'])){
	header("location:login.php");
}
include 'Connection.php';

$conn = new Connection;




if(isset($_POST['submit'])){
	$task1 = $_POST['task1'];
	$task2 = $_POST['task2'];


	$conn->insertTask($task1,$task2);
}
$result=$conn->getAll("SELECT * FROM task",null);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<a href="login.php">login</a>
<a href="logout.php">logout</a>
<a href="register.php">Register</a>


    <form action="" method="POST">
		<input type="text" name="task1"><br>
		<input type="text" name="task2"><br>
    <input type="submit" name="submit" value="ValueInsert">



    <table border="1" align="center">
		<?php
		foreach ($result as $res){
		?>
		<tr>
			<td><?php echo $res['id'] ?></td>
			<td><?php echo $res['task1'] ?></td>
			<td><?php echo $res['task2'] ?></td>
			<td><a href="edit.php?id=<?php echo $res['id']; ?>">edit</a></td>
		<td><a onclick="return confirm('Are you sure?')" href="delete.php?id=<?php echo $res['id']; ?>">delete</a></td>
		</tr>

		<?php
		}
		?>
 </table>
	</form>
  </body>
</html>
