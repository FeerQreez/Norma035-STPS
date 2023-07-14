<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	

		$statement = $connection->prepare("
			INSERT INTO opcionesprevias (idPrevia, opcionEsp) 
			VALUES (:idPrevia, :opcionEsp)
		");
		$result = $statement->execute(
			array(
				':idPrevia'	=>	$_POST["idPrevia"],
				':opcionEsp'=>	$_POST["opcionEsp"],
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
			"UPDATE opcionesprevias 
			SET idPrevia = :idPrevia, opcionEsp = :opcionEsp, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':idPrevia'	=>	$_POST["idPrevia"],
				':opcionEsp'	=>	$_POST["opcionEsp"],
				
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