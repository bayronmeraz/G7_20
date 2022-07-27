<?php
   if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
  }
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once ("../config/conexion.php");
    require_once("../models/Estudiante.php");  
    $estudiantes = new Estudiantes();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
       
      case "GetEstudiantes":
        $datos=$estudiantes->get_estudiantes();
        echo json_encode($datos);
      break;

      case "GetEstudiante":
        $datos=$estudiantes-> get_estudiante($body["numeroAlumno"]);
        echo json_encode($datos);
      break;

      case "InsertEstudiante":
        $datos=$estudiantes->insert_estudiante($body["numeroAlumno"], $body["nombre"], $body["apellidos"], $body["fechaNacimiento"], $body["direccion"], $body["altura"], $body["carrera"] );
        echo json_encode("Estudiante Agregado");
      break;  
      
      case "UpdateEstudiante":
        $datos=$estudiantes->update_estudiante($body["numeroAlumno"], $body["nombre"], $body["apellidos"], $body["fechaNacimiento"], $body["direccion"], $body["altura"], $body["carrera"] );
        echo json_encode("Estudiante actualizado");
      break;

      case "DeleteEstudiante":
        $datos=$estudiantes->delete_estudiante($body["numeroAlumno"]);
        echo json_encode("Estudiante eliminado");
      break;
    }

?>