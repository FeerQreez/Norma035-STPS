<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO categoriapuesto (IdCatePu, NomCata) 
			VALUES (:IdCatePu, :NomCata)
		");
		$result = $statement->execute(
			array(
				':IdCatePu'	=>	$_POST["IdCatePu"],
				':NomCata'	=>	$_POST["NomCata"],
			
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
			"UPDATE categoriapuesto
			SET IdCatePu = :IdCatePu, NomCata = :NomCata, image = :image  
			WHERE idPuesto = :idPuesto
			"
		);
		$result = $statement->execute(
			array(
				':IdCatePu'	=>	$_POST["IdCatePu"],
				':NomCata'	=>	$_POST["NomCata"],
				//':image'		=>	$image,
				':idPuesto'			=>	$_POST["idPuesto"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>