<?php
include('db.php');
include('function.php');
if(isset($_POST["idTra"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM acciones 
		WHERE idTra = '".$_POST["idTra"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["Id_Acci"] = $row["Id_Acci"];
		$output["Fecha"] = $row["Fecha"];
		
	}
	echo json_encode($output);
}
?>