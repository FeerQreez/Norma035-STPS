<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO puesto (idPuesto, NomPues) 
			VALUES (:idPuesto, :NomPues)
		");
		$result = $statement->execute(
			array(
				':idPuesto'	=>	$_POST["idPuesto"],
				':NomPues'	=>	$_POST["NomPues"],
		
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
			"UPDATE puesto 
			SET idPuesto = :idPuesto, NomPues = :NomPues, image = :image  
			WHERE idDepar = :idDepar
			"
		);
		$result = $statement->execute(
			array(
				':idPuesto'	=>	$_POST["idPuesto"],
				':NomPues'	=>	$_POST["NomPues"],
				
				':idDepar'			=>	$_POST["idDepar"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>