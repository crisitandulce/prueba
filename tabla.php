<!-- conexion a base de datos -->
<?php
	$servidor="localhost";
	$usuario="root";
	$clave="";
	$baseDeDatos="prueba";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

	if(!$enlace){
		echo"Error en la conexion con el servidor";
	}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <title>Formulario De Registro</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <!-- llamar librerias jquery de javascrip -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    </head>
    <body>
    	<center><h1>Datos Guardados</h1></center>
    	<!-- creacion de tabla jquery -->
    	<div class="tabla-responsive">
			<table id="datos" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>cedula</th>
					<th>nombres</th>
					<th>apellidos</th>
					<th>sexo</th>
					<th>codigo</th>
					<th>consecutivo</th>
					<th>fecha</th>

					
				</tr>
				</thead>
				<!-- realizamos consulta de datos a la BD -->
					<?php

						$consulta = "SELECT * FROM datos";
						$ejecutarConsulta = mysqli_query($enlace, $consulta);
						$verFilas = mysqli_num_rows($ejecutarConsulta);
						$fila = mysqli_fetch_array($ejecutarConsulta);

						if(!$ejecutarConsulta){
							echo"Error en la consulta";
						}else{
							if($verFilas<1){
								echo"<tr><td>Sin registros</td></tr>";
							}else{
								for($i=0; $i<=$fila; $i++){
									echo'
										<tr>
											<td>'.$fila[0].'</td>
											<td>'.$fila[1].'</td>
											<td>'.$fila[2].'</td>
											<td>'.$fila[3].'</td>
											<td>'.$fila[6].'</td>
											<td>'.$fila[4].'</td>
											<td>'.$fila[5].'</td>
										</tr>
									';
									$fila = mysqli_fetch_array($ejecutarConsulta);

								}

							}
						}


					?>
				
			</table>
		</div>
		<script>
	$(document).ready(function(){
		$('#datos').DataTable();
	});
</script>


		
</body>
</html>