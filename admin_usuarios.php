<?php
	include 'Configuracion.php';
	
?>
<html lang="es">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- /Bootstrap --> 	
    <style>
    .boton{float: right;}
    .boton12{float: right; margin-right: 5px}
    </style>
	</head>
	
	<body>
		
		<div class="container">
			<div class="row">
				<h2 style="text-align:center">GESTION USUARIOS</h2>
			</div>
			<div class="row">
                <a href="admin_usuarios.php" class="btn btn-warning btn-lg boton">Volver</a>
				<a href="nuevo_usuario.php" class=" btn btn-primary btn-lg boton12">Nuevo Usuario</a>
			</div>
			<br>
			
			<div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Telefono</th>
                            <th>Direccion</th>
                            <th>Constraseña</th>
							<th></th>
						</tr>
					</thead>
					
					<tbody>
        <?php
        //cogemos las filas de la tabla productos. 
        $query = $db->query("SELECT * FROM clientes ORDER BY id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
  
							<tr>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['correo']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['pwd']; ?></td>
								<td>
                                    <a href="modificar_usuarios.php?id=<?php echo $row['id']; ?>"><span class="btn btn-info glyphicon glyphicon-pencil"></span></a>
                                    <a href="#" data-href="eliminar.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="btn btn-danger boton2 glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
        <?php } }else{ ?>
        <p>Sin productos</p>
        <?php } ?>
						
					</tbody>
				</table>
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
					</div>
					
					<div class="modal-body">
						¿Desea eliminar este registro?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<a class="btn btn-danger btn-ok">Delete</a>
					</div>
				</div>
			</div>
		</div>
		
		<script>
			$('#confirm-delete').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
		</script>	
	</body>
</html>