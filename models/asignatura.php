 <?php
         class asignaturas extends Conectar{
           
            public function get_asignaturas(){
                $conectar = parent::conexion();
                parent::set_name();
                $sql="SELECT * FROM asignatura";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            }
           
            public function get_asignatura(){
                $conectar = parent::conexion();
                parent::set_name();
                $sql="SELECT * FROM asignatura WHERE CodigoAsignatura = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$CodigoAsignatura);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            
        }




?>