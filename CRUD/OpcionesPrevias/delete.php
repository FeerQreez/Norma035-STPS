<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM opcionesprevias WHERE idTra = :idTra"
	);
	$result = $statement->execute(
		array(
			':idTra'	=>	$_POST["idTra"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>