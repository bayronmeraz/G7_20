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

    require_once("../config/conexion.php");
    require_once("../models/Matricula.php");

    $matricula = new Matricula();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

        case "GetMatriculas":
            $datos=$matricula->get_matriculas();
            echo json_encode($datos);
        break;

        case "GetMatricula":
            $datos=$matricula->get_matricula($body["CodigoMatricula"]);
            echo json_encode($datos);
        break;

        case "InsertMatricula":
            $datos=$matricula->insert_matricula($body["CodigoMatricula"],$body["NombreAsignatura"],$body["NumeroAlumno"],$body["FechaMatricula"],$body["NumeroDocente"],$body["Carrera"],$body["NumeroEdificio"]);
            echo json_encode("Registro de Matricula Agregado");
        break;

        case "UpdateMatricula":
            $datos=$matricula->update_matricula($body["CodigoMatricula"],$body["NombreAsignatura"],$body["NumeroAlumno"],$body["FechaMatricula"],$body["NumeroDocente"],$body["Carrera"],$body["NumeroEdificio"]);
            echo json_encode("Registro de Matricula Actualizado");
        break;

        case "DeleteMatricula":
            $datos=$matricula->delete_matricula($body["CodigoMatricula"]);
            echo json_encode("Registro de Matricula Borrado");
        break;
    }
    ?>
    