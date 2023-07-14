<?php
include('db.php');
include('function.php');
if(isset($_POST["idCues"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM pregunta 
		WHERE idCues = '".$_POST["idCues"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["PreguntaEsp"] = $row["PreguntaEsp"];
		$output["idPre"] = $row["idPre"];
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