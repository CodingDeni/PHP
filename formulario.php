<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO DE REGISTRO</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <main>
        <form method="POST" action="" class="formulario">

            <p class="formulario__titulo">FORMULARIO DE REGISTRO</p>

            <div class="formulario__grupo">
                <label for="nombre">Nombre <span class="obligatorio">*</span> </label>
                <input type="text" name="nombre" class="form-input" required/>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Apellidos <span class="obligatorio">*</span> </label>
            <input type="text" name="apellido" class="form-input" required/>
            </div>

            <div class="formulario__grupo">
            <label for="nombre">Email <span class="obligatorio">*</span> </label>
            <input type="email" name="email" class="form-input" required/>
            </div>

            <p class="obligatorio">*Campos obligatorios</p>

            <div class="formulario__grupo">
                <button type="submit">REGISTRARSE</button>
            </div>
            
        
        <?php

        if($_POST){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];

            //Conexión con PDO 

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";

            //Crear conexión
            $conn = new mysqli($servername, $username, $password, $dbname);
            //Comprobar conexión 
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            //Crear QUERY
            $sql = "INSERT INTO usuario(nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";

            if ($conn->query($sql) === TRUE) {
                echo "Nuevo usuario creado correctamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            //CERRAR BBDD ->libera recursos del sistema
            $conn->close();
        }
        
        ?>
        </form>
    </main>
    
</body>
</html>