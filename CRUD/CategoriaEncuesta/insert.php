<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	

		$statement = $connection->prepare("
			INSERT INTO categorianecu (idCate, NomEsp) 
			VALUES (:idCate, :NomEsp)
		");
		$result = $statement->execute(
			array(
				':idCate'	=>	$_POST["idCate"],
				':NomEsp'	=>	$_POST["NomEsp"],
				
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
			"UPDATE categoriaencu
			SET idCate = :idCate, NomEsp = :NomEsp, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':idCate'	=>	$_POST["idCate"],
				':NomPues'	=>	$_POST["NomPues"],
			
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