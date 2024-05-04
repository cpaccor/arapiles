<?php
require_once 'conexion.php';
// Verificamos si se ha enviado el formulario mediante un POST
if ($_SERVER[ "REQUEST_METHOD" ] == "POST") {
    //inicializamos la variable mensaje que almacenaremos
    $mensaje = "";
    $mensajeError = "";

    /*** Bloque para introducir nombre equipo*****/
    // asignamos el nombre del equipo recibido en una variable
    $nombreEquipo = $_POST[ "nombreEquipo" ];


    try {//reliazamos captura de errores
        //preparamos una consulta para comprobar si el nombre del equipo ya existe en la base de datos
        $consulta = $bdd->prepare("SELECT COUNT(*) AS coincidencia FROM equipos WHERE nombreEquipo = :nombreEquipo");
        $consulta->bindParam(":nombreEquipo", $nombreEquipo, PDO::PARAM_STR);
        $consulta->execute();
        //almacenamos el resiultado de la consulta en una variable
        $fila = $consulta->fetch(PDO::FETCH_ASSOC);
        //si fila es mayor a 0 existira algun nombre en la base de datos
        if ($fila[ 'coincidencia' ] > 0) {
            // Si el nombre de equipo ya existe almacenamos el error en la variable.
            $mensajeError = "Ya existe un equipo con ese nombre. Por favor, elige otro nombre.";
            //redirigimos al formularioo y almacenamos un mensaje
            header("Location: inscripcion.html?mensajeError=" . urlencode($mensajeError));
            exit();

        } else {
            // si no existiese el nombre del equipo procesaremos el formulario
            // preparamos mla consulta para insertar los datos en la base de datos
            $insertarEquipo = $bdd->prepare("INSERT INTO equipos(nombreEquipo) VALUES (:nombreEquipo)");
            //vinculamos cada marcador de posicion con su variable correspondiente
            $insertarEquipo->bindParam(":nombreEquipo", $nombreEquipo, PDO::PARAM_STR);
           //ejecutamos la consulta y la almacenamos en una variable
            $resultado = $insertarEquipo->execute();
            //En caso de si o no se haya ejecutado la consulta alamcenaremos un mensaje, segun corresponda.
            if ($resultado) {
                $mensaje = "Equipo iscrito correctamente con dorsal nº: " . $bdd->lastInsertId() . "<br>";
            } else {
                $mensajeError = $mensajeError +"Equipo no se ha podido inscribir correctamente";
            }
            //redirigimos al formularioo y almacenamos un mensaje

        }
    } catch (PDOException $incidencia) {
        echo "Error en la inserción de equipo " . $incidencia->getMessage();
    }

    $idEquipo = $bdd->lastInsertId();

    try {//capturamos los posibles errores
        //creamos un bucle que se repetira 4 veces para ir recorriendo los datos enciados pro el formulario
        for ($i = 1; $i <= 4; $i++) {
            //declaramos las variables que iran almacenando los datos más el correspondiente valor de  "i"            
            $nombre = $_POST["nombre_" . $i];
            $apellido1 = $_POST["apellido1_" . $i];
            $apellido2 = $_POST["apellido2_" . $i];
            $dni = $_POST["dni_" . $i];
            $sexo = $_POST["sexo_" . $i];
            $fechaNacimiento = $_POST["fechaNacimiento_" . $i];
            $fcse = $_POST["fcse_" . $i];
            $matricula = $_POST["matricula_" . $i];
            $email = $_POST["email_" . $i];
            //preparamos la consulta que insertará los datos a la vace de datos
            $insertarParticipante = $bdd->prepare(
                
                "INSERT INTO participantes (idEquipo, nombre,  apellido1, apellido2, dni, sexo, fechaNacimiento, fcse, matricula, email) 
                VALUES (:idEquipo, :nombre, :apellido1, :apellido2, :dni, :sexo, :fechaNacimiento, :fcse, :matricula, :email)"
                );
            //vinculamos cada marcador de posición con la variable correspondiente
            $insertarParticipante->bindParam(":idEquipo", $idEquipo, PDO::PARAM_INT);
            $insertarParticipante->bindParam(":nombre", $nombre, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":apellido1", $apellido1, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":apellido2", $apellido2, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":dni", $dni, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":sexo", $sexo, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":fechaNacimiento", $fechaNacimiento, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":fcse", $fcse, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":matricula", $matricula, PDO::PARAM_STR);
            $insertarParticipante->bindParam(":email", $email, PDO::PARAM_STR);

            //ejecutamos la consulta y la almacenamos en una variable que posteriormente utilizaremos para comprobar si ha hab ido algun error
            $completado = $insertarParticipante->execute();
            if (!$completado) {
                $mensajeError = $mensajeError . "Error al insertar participantes";
                //redirigimos al formularioo y almacenamos un mensaje
                header("Location: inscripcion.html?mensajeError=" . urlencode($mensaje));
                exit();
            }
        }
    } catch (PDOException $incidencia) {
        echo "Error en la inserción de los participantes " . $incidencia->getMessage();
    }
    //redirigimos al formularioo y almacenamos un mensaje
    header("Location: inscripcion.html?mensaje=" . urlencode($mensaje));
    exit();
}