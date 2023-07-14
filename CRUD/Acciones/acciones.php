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
							<!-- <th width="10%">Imagen</th> -->
							<th width="35%">id_Acci</th>
							<th width="35%">Fecha</th>
							<th width="35%">Indicaciones</th>
							<th width="35%">Fecha_Final</th>
							<th width="35%">resultado</th>
							<th width="35%">idTra</th>
							
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
					<label>Ingresa tu ID de Acciones</label>
					<input type="text" name="id_Acci" id="id_Acci" class="form-control" />
					<br />
					<label>Ingresa tu Fecha</label>
					<input type="text" name="Fecha" id="Fecha" class="form-control" />
					<br />
					<label>Ingresa tus Indicaciones</label>
					<input type="text" name="Indicaciones" id="Indicaciones" class="form-control" />
					<br />
					<label>Ingresa tu Fecha Final</label>
					<input type="text" name="Fecha_Final" id="Fecha_Final" class="form-control" />
					<br />
					<label>Resultado</label>
					<input type="text" name="Resultado" id="Resultado" class="form-control" />
					<br />
				
				
				<!--
					<label>Selecciona una imagen de Usuario</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
                 -->
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

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var id_Acci = $('#Id_Acci').val();
		var Fecha = $('#Fecha').val();
		var indicaciones = $('#Indicaciones').val();
		var Fecha_Final = $('#Fecha_Final').val();
		var resultado = $('#resultado').val();
		var idTra = $('#idTra').val();
		
		if(nombre != '' && Apellido_P != '')
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
				$('#id_Acci').val(data.id_Acci);
				$('#Fecha').val(data.Fecha);
				$('#Indicaciones').val(data.Indicaciones);
				$('#Fecha_Final').val(data.Fecha_Final);
				$('#IdTra').val(data.idTra);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
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