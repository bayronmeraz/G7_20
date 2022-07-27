<?php
         class estudiantes extends Conectar{
           
            public function get_estudiantes(){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM estudiante";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            }
           
            public function get_estudiante($numeroAlumno){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM estudiante WHERE NUMEROALUMNO = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $numeroAlumno);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            
        }
?>