<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{


		$statement = $connection->prepare("
			INSERT INTO aco_trauma (idTrau, idTraba) 
			VALUES (:idTrau, :idTraba)
		");
		$result = $statement->execute(
			array(
				':idTrau'	=>	$_POST["idTrau"],
				':idTraba'	=>	$_POST["idTraba"],
				':image'		=>	$image
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
			"UPDATE aco_trauma 
			SET idTrau = :idTrau, idTraba = :idTraba, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':idTrau'	=>	$_POST["idTrau"],
				':idTraba'	=>	$_POST["idTraba"],
				':idTra'		=>	$_POST["idTra"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>