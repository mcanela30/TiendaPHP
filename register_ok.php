<?php
include 'Configuracion.php';


header("Content-Type: text/html;charset=utf-8");
if (isset($_POST["nombre"]))
{
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$direccion = $_POST["direccion"];
	$pwd = $_POST["pwd"];
	$pwd2 = $_POST["pwd2"];

	//Inserción de datos

	//ahora la pwd
    if($pwd!=$pwd2){
		echo "Error. Las contraseñas introducidas no coinciden";
		die("<script>setTimeout(\"location = 'register.html';\",1100);</script>");
	}

		//Primero compruebo si el nick existe
		$instruccion = "select count(*) as cuantos from clientes where nombre = '$nombre'";
		$res = mysqli_query($db, $instruccion);
		$datos = mysqli_fetch_assoc($res);
	
	if ($datos['cuantos'] == 0)
	{
		$pass=sha1($_POST['pwd']);
		$instruccion = "insert into clientes values ('null','$nombre','$correo','$telefono','$direccion', '$pass')";
		$res = mysqli_query($db, $instruccion);
		if (!$res) 
		{
			die("No se ha podido crear el usuario");
		}
		else
		{
			echo "Usuario creado";
			//me lleva al login para que pruebe mi contraseña
			echo "<script>alert('Usuario creado correctamente');</script>";
			include_once("login.html");
		}
	}
	else
	{
		echo "El nombre $nombre no está disponible";
		die("<script>setTimeout(\"location = 'register.html';\",1100);</script>");

	}

}
else 
{
	echo ("ERROR: No se puede introducir un nick en blanco");
	die("<script>setTimeout(\"location = 'register.html';\",1100);</script>");

}
?>