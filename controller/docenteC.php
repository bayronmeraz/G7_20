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
    require_once("../models/docente.php");  
    $docente = new docente();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){
       
        case "get_docentes":
          $datos=$docente->get_docentes();
          echo json_encode($datos);
        break;
  
        case "get_docente":
          $datos=$docente-> get_docente($body["NumeroDocente"]);
          echo json_encode($datos);
        break;
  
        case "insert_docente":
          $datos=$docente->insert_docente($body["NumeroDocente"], $body["NombreDocente"], $body["ApellidoDocente"], $body["FechaContratacion"], $body["DireccionDocente"], $body["SalarioDoncente"], $body["ProfesionDocente"] );
          echo json_encode("Docente Agregado");
        break;  
        
        case "UpdateEstudiante":
          $datos=$docente->update_docente($body["NumeroDocente"], $body["NombreDocente"], $body["ApellidoDocente"], $body["FechaContratacion"], $body["DireccionDocente"], $body["SalarioDoncente"], $body["ProfesionDocente"] );
          echo json_encode("Docente actualizado");
        break;
  
        case "DeleteEstudiante":
          $datos=$docente->delete_docente($body["NumeroDocente"]);
          echo json_encode("Docente eliminado");
        break;
      }

    ?>