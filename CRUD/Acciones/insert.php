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
		//echo $NombreTra;
		//echo $ApePater;
		//echo 'prueba';

		$statement = $connection->prepare("
			INSERT INTO acciones (Id_Acci, Fecha, ) 
			VALUES (:Id_Acci, :Fecha, )
		");
		$result = $statement->execute(
			array(
				':Id_Acci'	=>	$_POST["Id_Acci"],
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
			"UPDATE acciones 
			SET id_Acci = :id_Acci, Fecha = :Fecha, image = :image  
			WHERE idTra = :idTra
			"
		);
		$result = $statement->execute(
			array(
				':Id_Acci'	=>	$_POST["Id_Acci"],
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