<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		// $image = '';
		// if($_FILES["user_image"]["name"] != '')
		// {
		// 	$image = upload_image();
		// }

		echo $NombreTra;
		echo $ApePater;
		echo 'prueba';
		$statement = $connection->prepare("
			INSERT INTO Trabajador (NombreTra, ApePater) 
			
			VALUES (:NombreTra, :ApePater)
		");
		$result = $statement->execute(
			array(
				':NombreTra'	=>	$_POST["NombreTra"],
				':ApePater'	=>	$_POST["ApePater"],
			//	':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		// $image = '';
		// if($_FILES["user_image"]["name"] != '')
		// {
		// 	$image = upload_image();
		// }
		// else
		// {
		// 	$image = $_POST["hidden_user_image"];
		// }
		$statement = $connection->prepare(
			"UPDATE Trabajador 
			SET NombreTra = :NombreTra, ApePater = :ApePater, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':NombreTra'	=>	$_POST["NombreTra"],
				':ApePater'	=>	$_POST["ApePater"],
				//':image'		=>	$image,
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