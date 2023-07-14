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
		"DELETE FROM puesto WHERE idDepar = :idDepar"
	);
	$result = $statement->execute(
		array(
			':idDepar'	=>	$_POST["idDepar"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>