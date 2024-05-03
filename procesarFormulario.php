<?php
require_once 'conexion.php';

/*try {
    // Preparar la consulta SQL para insertar un nuevo equipo
    $insertarEquipo = "INSERT INTO equipos(nombreEquipo) VALUES ('$nombreEquipo')"; 
    $resultado = $bdd->query($insertarEquipo);   
    //comprobamos los errores
    if ($resultado){
        echo "Equipo insertado correctamente. <br>";
        echo "filas insertadas: ".$resultado->rowcount()."<br>";        
    }  else print_r($bdd->errorInfo()); 
    echo "Dorsal del equipo:". $bdd->lastInsertId()."<br>";  
    
} catch (PDOException $ex) {
    echo "Error al insertar equipo: " . $ex->getMessage();
}*/

// Verificamos si se ha enviado el formulario mediante un POST
if ($_SERVER[ "REQUEST_METHOD" ] == "POST") {

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
            $mensaje = "Ya existe un equipo con ese nombre. Por favor, elige otro nombre.";
            //redirigimos al formularioo y almacenamos un mensaje
            header("Location: inscripcion.html?mensaje=" . urlencode($mensaje));
            exit();

        } else {
            // Si el nombre de equipo no existe, proceder con el procesamiento del formulario
            // Aquí iría el código para insertar los datos en la base de datos
            $insertarEquipo = $bdd->prepare("INSERT INTO equipos(nombreEquipo) VALUES (:nombreEquipo)");
            $insertarEquipo->bindParam(":nombreEquipo", $nombreEquipo, PDO::PARAM_STR);
            $resultado = $insertarEquipo->execute();
            if ($resultado) {
                $mensaje = "Equipo introducido correctamente con dorsal nº: " . $bdd->lastInsertId();
            } else {
                $mensaje = "Equipo no se ha podido inscribir correctamente";
            }
            //redirigimos al formularioo y almacenamos un mensaje
            
        }
    } catch (PDOException $incidencia) {
        echo "Error en la inserción de equipo " . $incidencia->getMessage();
    }

    $idEquipo = $bdd->lastInsertId();
    
    try {
        for ($i=1; $i <=4 ; $i++) {             
            $nombre = $_POST[ "nombre_".$i];
            $apellido1 = $_POST[ "apellido1_".$i];
            $apellido2 = $_POST[ "apellido2_".$i];
            $dni = $_POST[ "dni_".$i];
            $sexo = $_POST["sexo_".$i];
            $fechaNacimiento = $_POST["fechaNacimiento_".$i];
            $fcse = $_POST["fcse_".$i];
            $matricula =$_POST["matricula_".$i];
            $insertarParticipante = $bdd->prepare(
                "INSERT INTO participantes (idEquipo, nombre, apellido1, apellido2, dni, sexo, fechaNacimiento, fcse, matricula) 
                VALUES (:idEquipo, :nombre, :apellido1, :apellido2, :dni, :sexo, :fechaNacimiento, :fcse, :matricula)");
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

        $insertarParticipante->execute();
        }
        
        /*$insertarParticipante = $bdd->prepare("INSERT INTO participantes (id_equipo, nombre, apellido1, apellido2, dni, sexo, fechaNacimiento, fcse, matricula) VALUES (NULL, $nombre, $apellido1, $apellido2, $dni, $sexo, $fechaNacimiento, $fcse, $matricula)");
        $nombre = $_POST[ "nombre_1" ];
    $apellido1 = $_POST[ "apellido1_1" ];
    $apellido2 = $_POST[ "apellido2_1" ];
    $dni = $_POST[ "dni_1" ];
    $sexo = $_POST[ "sexo_1" ];
    $fechaNacimiento = $_POST[ "fecha_nacimiento_1" ];
    $fcse = isset($_POST[ "fcse_1" ]) ? $_POST[ "fcse_1" ] : "No";
    $matriculaVehiculo = isset($_POST[ "matricula_1" ]) ? $_POST[ "matricula_1" ] : "";
        /*$insertarParticipante->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":apellido1", $apellido1, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":apellido2", $apellido2, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":dni", $dni, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":sexo", $sexo, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":fechaNacimiento", $fechaNacimiento, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":fcse", $fcse, PDO::PARAM_STR);
        $insertarParticipante->bindParam(":matricula", $matricula, PDO::PARAM_STR);*/

        //$insertarParticipante->execute();

    } catch (\Throwable $th) {
        //throw $th;
    }


    /*try {//reliazamos captura de errores
    // Preparar la consulta SQL para insertar un nuevo equipo    
    $insertarEquipo = "INSERT INTO equipos(nombreEquipo) VALUES ('$nombreEquipo')";
    //realizamos la consulta a la base de dato 
    $resultado = $bdd->query($insertarEquipo);   

    //comprobamos los errores
    if ($resultado){
        echo "Equipo insertado correctamente. <br>";
        echo "filas insertadas: ".$resultado->rowcount()."<br>";        
    }  else print_r($bdd->errorInfo()); 
    echo "Dorsal del equipo:". $bdd->lastInsertId()."<br>"; 
    
    } catch (PDOException $ex) {
    echo "Error al insertar equipo: " . $ex->getMessage();
    }*/


    header("Location: inscripcion.html?mensaje=" . urlencode($mensaje));
    exit();
}