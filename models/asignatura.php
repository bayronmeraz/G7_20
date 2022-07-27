 <?php
         class asignaturas extends Conectar{
           
            public function get_asignaturas(){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM asignatura";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            }
           
            public function get_asignatura($CodigoAsignatura){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM asignatura WHERE CodigoAsignatura = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$CodigoAsignatura);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function insert_asignatura($CodigoAsignatura, $NombreAsignatura, $Carrera, $FechaCreacion, $UnidadesValorativas, $PromedioAprobacion, $NumeroEdificio){
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "INSERT INTO asignatura(CodigoAsignatura, NombreAsignatura, Carrera, FechaCreacion, UnidadesValorativas, PromedioAprobacion, NumeroEdificio) 
                VALUES(?,?,?,?,?,?,?);"; 
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$CodigoAsignatura);
                $sql->bindValue(2,$NombreAsignatura);
                $sql->bindValue(3,$Carrera);
                $sql->bindValue(4,$FechaCreacion);
                $sql->bindValue(5,$UnidadesValorativas);
                $sql->bindValue(6,$PromedioAprobacion);
                $sql->bindValue(7,$NumeroEdificio);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }




?>