<?php
session_start();// variable de sesion
if (!isset($_SESSION['usuario'])) {
	header('location: login.php');// tambien hace un direccionamiento hacia una pagina.
}else{
    $usuarioactivo=$_SESSION['usuario'];
    $usuario_admin=$_SESSION['usuario_admin'];
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Estudiantes</title><br>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" type "text/css" href="estilos1.css">
</head>

<body>
<div class="barranavegacion">

            <div><a href="cerrar.php"> Cerrar Sesion </a> </div>
        </div>

   <div class="area_listados">

        <h1>Congreso estudiantil de ciencias</h1>




<?php   
$servername= "localhost";
$database= "congreso";
$username= "root";
$password= "";

echo "<div class=\"consulta\">";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn){
 die ("Conexion fallida....".mysqli_connect_error());

 } /* echo "<div>Conexion Exitosa.........";
 echo 'Conectado a la base de datos.</div><br>'; */


 $result = $conn->query("SELECT *  FROM estudiantes where usuario = '$usuarioactivo'");

 echo "<div>Bienvenido $usuarioactivo usted se registro con los siquientes datos:<br></div>";
echo "<center><div class=\"consulta\"> <table>
 <tr>
   <td><strong>Usuario</strong></td>
   <td><strong>Password</strong></td>
   <td><strong>Nombre</strong></td>
   <td><strong>Apellidos</strong></td>
   <td><strong>Email</strong></td>
   <td><strong>Escuela</strong></td>
   <td><strong>Transporte?</strong></td>
   <td><strong>Comida?</strong></td>
   <td><strong>Hospedaje?</strong></td>
 </tr>";



 foreach ($result as $row) {
   

echo "
   <tr>
   <td>".$row['usuario']."</td>
   <td>".$row['password']."</td>
   <td>".$row['nombre']."</td>
   <td>".$row['apellidos']."</td>
   <td>".$row['email']."</td>
   <td>".$row['escuela']."</td>
   <td>".$row['transporte']."</td>
   <td>".$row['comida']."</td>
   <td>".$row['hospedaje']."</td>
   </tr>";
  
  
       
}

echo "</table></div> </center>";
echo "<div>Para cambiar sus datos comuniquese con un administrador del congreso<br></div>";

            $result->close();

            $conn->close();
          
?>