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



<?php   

$id = $_POST["idregistro"];
$servername= "localhost";
$database= "congreso";
$username= "root";
$password= "";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn){
 die ("Conexion fallida....".mysqli_connect_error());
 } /* echo "Conexion Exitosa........."; */

 $result = $conn->query("SELECT *  FROM estudiantes where usuario = '$id'");

 


 foreach ($result as $row) {
   
       $usuario = $row['usuario'];
       $password = $row['password'];
       $nombre = $row['nombre'];
       $apellidos = $row['apellidos'];
       $email = $row['email'];
       $escuela = $row['escuela'];
       $transporte = $row['transporte'];
       $comida = $row['comida'];
       $hospedaje = $row['hospedaje'];
      
           
    }


?>


<?php


if(is_null($usuario)){ 
    echo "<script>alert('Usuario desconocido');</script>";
    header('location: modificar.php');} 

?>


<!DOCTYPE html>
<html>

<head>
    <title>Inicio de sesion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" type "text/css" href="estilos1.css">
</head>

<body>

    
    <div class="contenedor_principal">
    <div class="barranavegacion">
            <div><a href="index.php">Listado</a></div>
            <div><a href="borrado.php"> Eliminar usuario </a> </div>
            <div><a href="modificar.php"> Modificar </a> </div>
            <div><a href="cerrar.php"> Cerrar Sesion </a> </div>
        </div>

        <h1>ACTUALIZAR REGISTRO</h1>
        <form action="actualizacion_datos.php"  class="form-area" method="POST">
            <center>

            <div class = "informacion"> 
          
            <div class="datos_alumno">
            <h2> DATOS DE CONTACTO</h2>
                <label for "nombre"> Nombre</label>
              
                <?php  echo "<input type=\"text\" name=\"nombre\" value= \"$nombre\" required>   ";  ?>
                <label for="apellidos"> Apellidos</label>
               
                <?php  echo "<input type=\"text\" name=\"apellidos\" value= \"$apellidos\" required>   ";  ?>
                <label for="email"> Correo electronico</label>
              
                <?php  echo "<input type=\"email\" name=\"email\" value= \"$email\" required>   ";  ?>
                <label for "escuela"> Escuela de procedencia</label>
               
                <?php  echo "<input type=\"text\" name=\"escuela\" value= \"$escuela\" required>   ";  ?>
                
            </div>
 
            <div class="usuario">
            <h2> INFORMACION DE USUARIO</h2>
            <label for "usuario"> Usuario</label>
            <?php  echo "<input type=\"text\" name=\"usuario\" value= \"$usuario\" required>   ";  ?>
            <label for "pass"> Password</label>
            <?php  echo "<input type=\"password\" name=\"pass\" value= \"$password\" required>   ";  ?>
            </div>


            <div class="apoyo">
            <h2> APOYOS PARA ASISTENCIA</h2>

            <?php  if ($transporte=="Solicita transporte") {
       echo "  <label><input type=\"checkbox\" id=\"cbox1\" name=\"transporte\" value=\"Solicita transporte\" checked=\"checked\"> Transporte</label><br> " ;
            }
            else {
     echo "<label><input type=\"checkbox\" id=\"cbox1\" name=\"transporte\" value=\"Solicita transporte\" > Transporte</label><br> " ;
            }
                
                ?>

<?php  if ($comida =="Solicita apoyo para comida") {
       echo "  <label><input type=\"checkbox\" id=\"cbox2\" name=\"comida\" value=\"Solicita apoyo para comida\" checked=\"checked\"> Comida</label><br> " ;
            }
            else {
     echo "<label><input type=\"checkbox\" id=\"cbox2\" name=\"comida\" value=\"Solicita apoyo para comida\" > Comida</label><br> " ;
            }
                
                ?>


<?php  if ($hospedaje =="Solicita hospedaje") {
       echo "  <label><input type=\"checkbox\" id=\"cbox3\" name=\"hospedaje\" value=\"Solicita hospedaje\" checked=\"checked\"> Hospedaje</label><br> " ;
            }
            else {
     echo "<label><input type=\"checkbox\" id=\"cbox3\" name=\"hospedaje\" value=\"Solicita hospedaje\" > Hospedaje</label><br> " ;
            }
                
                ?>



            </div>

            </div> 
</center>

            <div class="boton">
            <button type="submit"> ACTUALIZAR</button>
            </div>
           
        </form>
        
    </div>

    
</body>


</html>