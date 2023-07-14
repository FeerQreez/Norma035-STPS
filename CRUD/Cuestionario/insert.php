<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO cuestionario (Nombre, idTra) 
			VALUES (:Nombre, :idTra)
		");
		$result = $statement->execute(
			array(
				':Nombre'	=>	$_POST["Nombre"],
				':idtra'	=>	$_POST["idTra"],
			
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
			"UPDATE cuestionario 
			SET Nombre = :Nombre, idTra = :idTra, image = :image  
			WHERE idCues = :idCues
			"
		);
		$result = $statement->execute(
			array(
				':Nombre'	=>	$_POST["Nombre"],
				':idTra'	=>	$_POST["idTra"],
			
				':idCues'			=>	$_POST["idCues"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>