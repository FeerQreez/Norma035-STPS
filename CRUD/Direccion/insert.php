<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO direccion (IdDire, idCal) 
			VALUES (:IdDire, :idCal)
		");
		$result = $statement->execute(
			array(
				':IdDire'	=>	$_POST["idDire"],
				':idCal'	=>	$_POST["idCal"],
			
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE direccion 
			SET IdDire = :IdDire, idCal = :idCal,  
			WHERE idCol = :idCol
			"
		);
		$result = $statement->execute(
			array(
				':IdDire'	=>	$_POST["idDire"],
				':idCal'	=>	$_POST["idCal"],
				':idCol'			=>	$_POST["idCol"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>