<?php
session_start();// variable de sesion
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');// tambien hace un direccionamiento hacia una pagina.
}else{
    $usuarioactivo=$_SESSION['usuario'];
    $usuario_admin=$_SESSION['usuario_admin'];
}

if(!$usuario_admin){ header('location: estudiante.php');} 
// Si no es usuario administrador pero conoce la url seguiria siendo redirigido a la zona de estudiantes
?>


<!DOCTYPE html>
<html>

<head>
    <title>Administración del congreso</title><br>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type "text/css" href="estilos1.css">
</head>

<body>

<div class="barranavegacion">
            <div><a href="index.php">Listado</a></div>
            <div><a href="borrado.php"> Eliminar usuario </a> </div>
            <div><a href="modificar.php"> Modificar </a> </div>
            <div><a href="cerrar.php"> Cerrar Sesion </a> </div>
        </div>


<?php   

$id = $_POST["idregistro"];
$servername= "localhost";
$database= "congreso";
$username= "root";
$password= "";



$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn){
 die ("Conexion fallida....".mysqli_connect_error());


 } echo "Conexion Exitosa.........";




$sql=  " DELETE FROM estudiantes WHERE usuario= '$id' ";

if (mysqli_query($conn,$sql)){
    echo "Borrado exitoso";
 
} else {
    echo "Error al borrar registro";
  

}
mysqli_close($conn);
?>







      
</body>


</html>