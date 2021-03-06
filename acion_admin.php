<?php
include 'Configuracion.php';// incluimos archivo de conexion
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    .boton{float: right;}
    .boton12{float: right; margin-right: 5px}
    </style>
</head>
</head>
<body>
<div class="container">
<div class="panel-body">
    <h2 style="text-align:center">GESTION PRODUCTOS</h2>
        <a href="#" data-href="login.html" class="btn btn-danger btn-lg boton" data-toggle="modal" data-target="#salir"><i class="glyphicon glyphicon-off"></i> Salir</a>
    <!-- Mensaje de salir -->
    <div class="modal fade" id="salir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Cerrar Sesión</h4>
                </div>
                
                <div class="modal-body">
                    Seguro que quiere salir de la sesión?
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-danger btn-ok">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#salir').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            
            $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
        });
    </script>	
		<a href="nuevo_producto.php" class=" btn btn-primary btn-lg boton12">Nuevo Producto</a>
		<a href="menu_admin.html" class="btn btn-info btn-lg boton12"><i class="glyphicon glyphicon-circle-arrow-left"></i> Volver</a>
    <div id="products" class="row list-group">

    <!-- PRODUCTOS -->
    <br><br><br><br>
    <div class="row table-responsive">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Descripcion</th>
							<th>Precio</th>
							<th></th>
						</tr>
					</thead>

        <?php
        //cogemos las filas de la tabla productos. 
        $query = $db->query("SELECT * FROM mis_productos ORDER BY id");
        if($query->num_rows > 0){ 
            while($row = $query->fetch_assoc()){
        ?>
        <!-- y los printamos  -->
                <tr>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td><?php echo $row['precio']; ?></td>
                    <td>
                        <a href="modificar_producto.php?id=<?php echo $row['id']; ?>"><span class="btn btn-info glyphicon glyphicon-pencil"></span></a>
                        <a href="#" data-href="eliminar_producto.php?id=<?php echo $row['id']; ?>" data-toggle="modal" data-target="#confirm-delete"><span class="btn btn-danger glyphicon glyphicon-trash"></span></a>

                    </td>
                </div>
            </div>
        </div>
        <?php } }else{ ?>
        <p>Sin productos</p>
        <?php } ?>
        <!-- Modal -->
		<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel">Eliminar Producto</h4>
					</div>
					
					<div class="modal-body">
						Seguro que quiere eliminar este producto?
					</div>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-danger btn-ok">Eliminar</a>
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
    </div>
        </div>
 </div>
</body>
</html>