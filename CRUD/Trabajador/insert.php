<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO trabajador (NombreTra, ApePater) 
			VALUES (:NombreTra, :ApePater)
		");
		$result = $statement->execute(
			array(
				':NombreTra'=>	$_POST["NombreTra"],
				':ApePater'	=>	$_POST["ApePater"],
				
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
			"UPDATE trabajador 
			SET NombreTra = :NombreTra, ApePater = :ApePater, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':NombreTra'	=>	$_POST["NombreTra"],
				':ApePater'	=>	$_POST["ApePater"],
			
				':idTra'			=>	$_POST["idTra"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>