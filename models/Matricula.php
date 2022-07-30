<?php
         class matricula extends Conectar{
           
            Public function get_matriculas(){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM matricula";
                $sql=$conectar->prepare($sql);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

            }
           
            Public function get_matricula($CodigoMatricula){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="SELECT * FROM matricula WHERE CodigoMatricula = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $CodigoMatricula);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            Public function insert_matricula($CodigoMatricula, $NombreAsignatura, $NumeroAlumno, $FechaMatricula, $NumeroDocente, $Carrera, $NumeroEdificio){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="INSERT INTO matricula(CodigoMatricula, NombreAsignatura, NumeroAlumno, FechaMatricula, NumeroDocente, Carrera, NumeroEdificio)
                VALUES (?,?,?,?,?,?,?);";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $CodigoMatricula);
                $sql->bindValue(2, $NombreAsignatura);
                $sql->bindValue(3, $NumeroAlumno);
                $sql->bindValue(4, $FechaMatricula);
                $sql->bindValue(5, $NumeroDocente);
                $sql->bindValue(6, $Carrera);
                $sql->bindValue(7, $NumeroEdificio);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            Public function update_matricula($CodigoMatricula, $NombreAsignatura, $NumeroAlumno, $FechaMatricula, $NumeroDocente, $Carrera, $NumeroEdificio){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="UPDATE matricula SET NombreAsignatura=?, NumeroAlumno=?, FechaMatricula=?, NumeroDocente=?, Carrera=?, NumeroEdificio=?
                WHERE CodigoMatricula=?;";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $NombreAsignatura);
                $sql->bindValue(2, $NumeroAlumno);
                $sql->bindValue(3, $FechaMatricula);
                $sql->bindValue(4, $NumeroDocente);
                $sql->bindValue(5, $Carrera);
                $sql->bindValue(6, $NumeroEdificio);
                $sql->bindValue(7, $CodigoMatricula);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            Public function delete_matricula($CodigoMatricula){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="DELETE FROM matricula WHERE CodigoMatricula=?;";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $CodigoMatricula);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }      
?>