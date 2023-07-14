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
		"DELETE FROM departamento WHERE Num_Tra = :Num_Tra"
	);
	$result = $statement->execute(
		array(
			':Num_Tra'	=>	$_POST["Num_Tra"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>