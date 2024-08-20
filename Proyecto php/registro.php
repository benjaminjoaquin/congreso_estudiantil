<!DOCTYPE html>
<html>

<head>
    <title>formulario</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" type "text/css" href="estilos1.css">
</head>

<body>
    <div class="contenedor_principal">

        <h1>Registro de nuevo usuario</h1>
        <form action="registro_datos.php"  class="form-area" method="POST">
            <center>

            <div class = "informacion"> 
          
            <div class="datos_alumno">
            <h2> DATOS DE CONTACTO</h2>
                <label for "nombre"> Nombre</label>
                <input type="text" name="nombre" required>
                <label for="apellidos"> Apellidos</label>
                <input type="text" name="apellidos" required>
                <label for="email"> Correo electronico</label>
                <input type="email" name="email" required>
                <label for "escuela"> Escuela de procedencia</label>
                <input type="text" name="escuela" required>
                
            </div>

            <div class="usuario">
            <h2> INFORMACION DE USUARIO</h2>
            <label for "usuario"> Usuario</label>
            <input type="text" name="usuario" required>
            <label for "pass"> Password</label>
            <input type="password" name="pass" required>
            </div>


            <div class="apoyo">
            <h2> APOYOS PARA ASISTENCIA</h2>

            <label><input type="checkbox" id="cbox1" name="transporte" value="Solicita transporte"> Transporte</label><br>
            <label><input type="checkbox" id="cbox2" name="comida" value="Solicita apoyo para comida"> Comida</label><br>
            <label><input type="checkbox" id="cbox3" name="hospedaje" value="Solicita hospedaje"> Hospedaje</label><br>


            </div>

            </div> 
</center>

            <div class="boton">
            <button type="submit"> Enviar datos</button>
            </div>
           
        </form>
        
    </div>



</body>

</html>