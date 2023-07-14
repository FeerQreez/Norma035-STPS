<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO cuescampos (idCampo, idCues) 
			VALUES (:idCampo, :idCues)
		");
		$result = $statement->execute(
			array(
				':idCampo'	=>	$_POST["idCampo"],
				':idCues'	=>	$_POST["idCues"],
			
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
			"UPDATE cuescampos 
			SET idCampo = :idCampo, idCues = :idCues, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':idCues'	=>	$_POST["idCues"],
				':idCampo'	=>	$_POST["idCampo"],
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