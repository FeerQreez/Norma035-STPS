<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		

		$statement = $connection->prepare("
			INSERT INTO pregunta (preguntaEsp, idPre) 
			VALUES (:preguntaEsp, :idPre)
		");
		$result = $statement->execute(
			array(
                ':preguntaEsp'	=>	$_POST["preguntaEsp"],
				':idPre'	=>	$_POST["idPre"],
				
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
			"UPDATE pregunta 
			SET PreguntaEsp = :preguntaEsp, idPre = :idPre, image = :image  
			WHERE idCues = :idCues
			"
		);
		$result = $statement->execute(
			array(
				':preguntaEsp'	=>	$_POST["preguntaEsp"],
				':idPre'	=>	$_POST["idPre"],
			
				':idCues'			=>	$_POST["idCues"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>