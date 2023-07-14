<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO colonia (idCol, NomCol) 
			VALUES (:idCol, :NomCol)
		");
		$result = $statement->execute(
			array(
				':idCol'	=>	$_POST["idCol"],
				':NomCol'	=>	$_POST["NomCol"],
			
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
			"UPDATE colonia 
			SET idCol = :idCol, NomCol = :NomCol,   
			WHERE CodigoPost = :CodigoPost
			"
		);
		$result = $statement->execute(
			array(
				':idCol'	=>	$_POST["idCol"],
				':NomCol'	=>	$_POST["NomCol"],
				
				':CodigoPost'			=>	$_POST["CodigoPost"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>