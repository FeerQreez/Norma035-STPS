<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM trabajador ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE NombreTra LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR ApePater LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY idTra DESC ';
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
	// $image = '';
	// if($row["image"] != '')
	// {
	// 	$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	// }
	// else
	// {
	// 	$image = '';
	// }
	$sub_array = array();
	//$sub_array[] = $image;
	$sub_array[] = $row["NombreTra"];
	$sub_array[] = $row["ApePater"];
	$sub_array[] = $row["ApeMate"];
	$sub_array[] = $row["RFC"];
	$sub_array[] = $row["CURP"];
	$sub_array[] = $row["Fecha_Ingreso"];
	$sub_array[] = $row["Fecha_Salida"];
	$sub_array[] = $row["idDire"];
	$sub_array[] = $row["idPuesto"];
	$sub_array[] = '<button type="button" name="update" idTra="'.$row["idTra"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" idTra="'.$row["idTra"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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