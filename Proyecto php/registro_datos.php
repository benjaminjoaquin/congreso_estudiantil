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
<h1>Congreso estudiantil de ciencias</h1>

<div class="barranavegacion">
            <div><a href="login.php">Volver al inicio</a></div>
          
        </div>

<div class="contenedor_principal">



<?php   

error_reporting(0); 

/* RECIBE LOS DATOS */

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$email = $_POST["email"];
$escuela= $_POST ["escuela"];
$usuario= $_POST ["usuario"];
$password= $_POST ["pass"];
$transporte= $_POST ["transporte"];       if (is_null($transporte)) { $transporte = "Sin transporte";}
$comida= $_POST ["comida"];               if (is_null($comida)) { $comida = "Sin comida";}
$hospedaje= $_POST ["hospedaje"];         if (is_null($hospedaje)) { $hospedaje = "Sin hospedaje";}

/* IMPRIME LOS DATOS */

echo "Datos de contacto <br>";
echo "Nombre : ".$nombre."<br>";
echo "Apellidos: ".$apellidos."<br>";
echo "Email : ".$email."<br>";
echo "Escuela: ".$escuela."<br><br>";
echo "Datos de sesión <br>";
echo "Usuario: ".$usuario."<br>";
echo "Password: ".$password."<br><br>";
echo "Apoyos para la asistencia <br>";
echo " ".$transporte."<br>";
echo " ".$comida."<br>";
echo " ".$hospedaje."<br>";



	


/* HACE LA CONEXIÓN A LA BD */

$servername= "localhost";
$database= "congreso";
$username= "root";
$pass= "";              /* variable pass para no confundir con la password del usuario*/
$conn = mysqli_connect($servername,$username,$pass,$database);
if (!$conn){
 die ("Conexion fallida....".mysqli_connect_error());

 } echo "<br> Conexion a la BD exitosa.........";

/* HACE LA INSERCION A LA BD */
 $sql= 
 "INSERT INTO estudiantes (usuario,     password,   nombre,   apellidos,   email,   escuela,   transporte,   comida,   hospedaje)
                   VALUES ('$usuario','$password','$nombre','$apellidos','$email','$escuela','$transporte','$comida','$hospedaje') ";

if (mysqli_query($conn,$sql)){
    echo "registro exitoso";
} else {

    echo "Error al registrar<br>".mysqli_error($conn)."";
   
 
}

/* CIERRA LA CONEXIÓN A LA BD */
mysqli_close($conn); 


?>


            
           
</div> 
</body>

</html>