<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM aco_trauma ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE idTrau LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR idTraba LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY idTraba DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();

	$sub_array[] = $row["idTrau"];
	$sub_array[] = $row["idTra"];
	$sub_array[] = $row["Fecha"];
	$sub_array[] = $row["Descripcion"];
	$sub_array[] = $row["Consecuencias"];
	$sub_array[] = $row["Recomendaciones"];
	$sub_array[] = $row["idTraba"];
	$sub_array[] = '<button type="button" name="update" idTra="'.$row["idTra"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" idTra="'.$row["idTra"].'" class="btn btn-danger btn-xs delete">Hola pai</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>