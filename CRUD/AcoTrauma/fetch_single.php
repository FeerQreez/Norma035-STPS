<?php
include('db.php');
include('function.php');
if(isset($_POST["idTraba"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM aco_trauma 
		WHERE idTraba = '".$_POST["idTraba"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["idTrau"] = $row["idTrau"];
		$output["idTraba"] = $row["idTraba"];
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