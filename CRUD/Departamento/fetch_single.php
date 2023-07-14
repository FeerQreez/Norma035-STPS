<?php
include('db.php');
include('function.php');
if(isset($_POST["Num_Tra"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM departamento 
		WHERE Num_Tra = '".$_POST["Num_Tra"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["idDepar"] = $row["idDepar"];
		$output["Nombre_Depa"] = $row["Nombre_Depa"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>