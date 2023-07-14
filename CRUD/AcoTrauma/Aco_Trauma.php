<html>
	<head>
		<title> - Encuesta 035 Porfavor Ingrese Sus Datos Correctamente </title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="shortcut icon" href="#">
		
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align ="center">Encuesta 035 Porfavor Ingrese Sus Datos Correctamente</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">AGREGAR</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="35%">idTrau</th>
							<th width="35%">idTra</th>
							<th width="35%">Fecha</th>
							<th width="35%">Descripcion</th>
							<th width="35%">Consecuencias</th>
							<th width="35%">Recomendaciones</th>
							<th width="35%">idTraba</th>
							<th width="10%">Editar</th>
							<th width="10%">Borrar</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">AGREGAR USUARIO</h4>
				</div>
				<div class="modal-body">
					<label>Ingresa tu Id Trauma</label>
					<input type="text" name="idTrau" id="idTrau" class="form-control" />
					<br />
					<label>Ingresa tu id Trabajador</label>
					<input type="text" name="idTra" id="idTra" class="form-control" />
					<br />
					<label>Ingresa Fecha</label>
					<input type="text" name="Fecha" id="Fecha" class="form-control" />
					<br />
					<label>Descripcion</label>
					<input type="text" name="Descripcion" id="Descripcion" class="form-control" />
					<br />
					<label>Consecuencias</label>
					<input type="text" name="Consecuencias" id="Consecuencias" class="form-control" />
					<br />
					<label>Recomendaciones</label>
					<input type="text" name="Recomendaciones" id="Recomendaciones" class="form-control" />
					<br />
					<label> id Trabajador</label>
					<input type="text" name="idTraba" id="idTraba" class="form-control" />
					<br />
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});
	console.log("datatable",dataTable);
	

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var idTrau = $('#idTrau').val();
		var idTra = $('#idTra').val();
		var Fecha = $('#Fecha').val();
		var Descripcion = $('#Descripcion').val();
		var Consecuencias = $('#Consecuencias').val();
		var Recomendaciones = $('#Recomendaciones').val();
		var idTraba = $('#idTraba').val();
			
		if(idTrau != '' && idTraba != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#idTrau').val(data.idTrau);
				$('#idTra').val(data.idTra);
				$('#Fecha').val(data.Fecha);
				$('#Descripcion').val(data.Descripcion);
				$('#Consecuencias').val(data.Consecuencias);
				$('#Recomendaciones').val(data.Recomendaciones);
				$('#idTraba').val(data.idTraba);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				//$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		
		var user_id  = $(this).attr("idTrau");
		console.log("THIS",this);
		if(confirm(" Estas Seguro de  Borrar Esto ?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>