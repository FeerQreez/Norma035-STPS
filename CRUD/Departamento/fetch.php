<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM departamento ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE idDepar LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR Nombre_Depa LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY Num_Tra DESC ';
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

	$sub_array[] = $row["idDepar"];
	$sub_array[] = $row["Nombre_Depa"];
	$sub_array[] = $row["Num_Tra"];
	
	$sub_array[] = '<button type="button" name="update" Num_Tra="'.$row["Num_Tra"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" Num_Tra="'.$row["Num_Tra"].'" class="btn btn-danger btn-xs delete">Delete</button>';
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