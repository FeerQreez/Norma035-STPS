<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO diagnostico (Id_Diag, Fecha) 
			VALUES (:Id_Diag, :Fecha)
		");
		$result = $statement->execute(
			array(
				':Id_Diag'	=>	$_POST["Id_Diag"],
				':Fecha'	=>	$_POST["Fecha"],
			
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
			"UPDATE diagnostico 
			SET Id_Diag = :Id_Diag, Fecha = :Fecha, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':Id_Diag'	=>	$_POST["Id_Diag"],
				':Fecha'	=>	$_POST["Fecha"],
		
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