<?php
	session_start();// Esta funcion siempre tiene que ir al principio
	include_once('conexion.php');// invoca al archivo conexion.php

	$us = $_POST['usuario']; // son los valores que envio desde el teclado
	$pw = $_POST['clave'];

$qry = "SELECT * FROM estudiantes WHERE usuario = '".$us."' AND password ='".$pw."'";
$resultado = mysqli_query($conn,$qry);

	if ($reg=mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
		$_SESSION['usuario']=$reg["usuario"];// despues del =, es lo que esta en la BD
		$_SESSION['usuario_admin']= false;
		
		echo "<script>location.href='estudiante.php';</script>";//es un redireccionamiento automatico a la pagina linkeado
	}

/* 	AQUI SE BUSCA EN LA OTRA TABLA DE USUARIOS EN CASO DE SER UN ADMINISTRADOR  */
	else{
		$qry = "SELECT * FROM administradores WHERE usuario = '".$us."' AND password ='".$pw."'";
		$resultado = mysqli_query($conn,$qry);
	if ($reg=mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
		$_SESSION['usuario']=$reg["usuario"];// despues del =, es lo que esta en la BD
		$_SESSION['usuario_admin']=true;
		
		echo "<script>location.href='index.php';</script>";//es un redireccionamiento automatico a la pagina linkeado
	}  else{
		echo "<script>alert('Clave o Usuario Incorrecto');</script>";
		echo "<script>location.href='login.php';</script>";
     	}
	}

 ?>
