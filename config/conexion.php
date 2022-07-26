<?php
class Conectar{
protected $dbh;

protected function Conexion(){
try {
$conectar =$this-> $dbh = new PDO("mysql:host=20.216.41.245;dbname=g1_20","G7_20", "a60CZ6ku");
return $conectar;
} catch(Exception $e){
print "!Error BD!:".$e->getmessager()."<br/>";
die();
}

}
public function set_name(){
    return $this->dbh->query("SET NAME 'utf8'");
}


}

?>