<?php

include('db.php');
include("function.php");

if(isset($_POST["idTra"]))
{
	$image = get_image_name($_POST["idTra"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM aco_trauma WHERE idTraba = :idTraba"
	);
	$result = $statement->execute(
		array(
			':idTraba'	=>	$_POST["idTraba"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>