<?php
class Connection{

	public $conn;

	public function __construct()
	{
		$this->conn = new PDO('mysql:host=localhost;dbname=sumon','root','');
	}


	public function insertTask($task1,$task2)
	{
		try{
			$statement = $this->conn->prepare("INSERT INTO task(task1,task2) VALUES (:task1,:task2)");
      $statement->execute(
      						array(
      							':task1' => $task1,
      							':task2' => $task2,
      						)
      					);
					echo "Inserted";
		}catch(\Exception $e){
			echo "error: ".$e->getMessage();
		}
  }
  public function getAll($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
		return $statement->fetchAll();
	}
  public function update($query,$array)
	{
		$statement = $this->conn->prepare($query);
		$statement->execute($array);
	}
}

	?>
