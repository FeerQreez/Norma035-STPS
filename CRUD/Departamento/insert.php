<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO departamento (idDepar, Nombre_Depa) 
			VALUES (:idDepar, :Nombre_Depa)
		");
		$result = $statement->execute(
			array(
				':idDepa'	=>	$_POST["idDepa"],
				':Nombre_Depa'	=>	$_POST["Nombre_Depa"],
			
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
			"UPDATE departamento 
			SET idDepar = :idDepar, Nombre_Depa = :Nombre_Depa,  
			WHERE Num_Tra = :Num_Tra
			"
		);
		$result = $statement->execute(
			array(
				':idDepar'	=>	$_POST["idDepar"],
				':Nombre_Depa'	=>	$_POST["Nombre_Depa"],,
				':Num_Tra'			=>	$_POST["Num_Tra"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>