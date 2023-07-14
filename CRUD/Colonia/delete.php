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
		"DELETE FROM colonia WHERE CodigoPost = :CodigoPost"
	);
	$result = $statement->execute(
		array(
			':CodigoPost'	=>	$_POST["CodigoPost"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>