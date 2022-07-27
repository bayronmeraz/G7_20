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
    require_once("../models/asignatura.php");

    $asignatura = new asignaturas();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["opc"]){

      case "Getasignaturas":
        $datos = $asignatura-> get_asignaturas();
        echo json_decode($datos);
        break;
      
        case "Getasignatura":
          $datos=$asignatura-> get_asignatura($body["CodigoAsignatura"]);
          echo json_decode($datos);
          break; 
          
          case "insertasignatura":
            $datos=$asignatura-> insert_asignatura($body["CodigoAsignatura"],$body["NombreAsignatura"], $body["Carrera"], $body["FechaCreacion"], $body["UnidadesValorativas"], $body["PromedioAprobacion"], $body["NumeroEdificio"]);
            echo json_decode("Asignatura agregada con exito");
            break;  
    }


?>