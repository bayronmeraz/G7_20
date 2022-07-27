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
                $sql="SELECT * FROM estudiante WHERE numeroAlumno = ?";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1, $numeroAlumno);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function insert_estudiante($numeroAlumno, $nombre, $apellidos, $fechaNacimiento, $direccion, $altura, $carrera){
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "INSERT INTO estudiante(numeroAlumno, nombre, apellidos, fechaNacimiento, direccion, altura, carrera) 
                VALUES(?,?,?,?,?,?,?);"; 
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$numeroAlumno);
                $sql->bindValue(2,$nombre);
                $sql->bindValue(3,$apellidos);
                $sql->bindValue(4,$fechaNacimiento);
                $sql->bindValue(5,$direccion);
                $sql->bindValue(6,$altura);
                $sql->bindValue(7,$carrera);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function update_estudiante($numeroAlumno, $nombre, $apellidos, $fechaNacimiento, $direccion, $altura, $carrera){
                $conectar = parent::conexion();
                parent::set_names();
                $sql = "UPDATE estudiante SET nombre= ?, apellidos= ?, fechaNacimiento= ?, direccion= ?, altura= ?, carrera= ?
                WHERE numeroAlumno = ?;";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$nombre);
                $sql->bindValue(2,$apellidos);
                $sql->bindValue(3,$fechaNacimiento);
                $sql->bindValue(4,$direccion);
                $sql->bindValue(5,$altura);
                $sql->bindValue(6,$carrera);
                $sql->bindValue(7,$numeroAlumno);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }

            public function delete_estudiante($numeroAlumno){
                $conectar = parent::conexion();
                parent::set_names();
                $sql="DELETE FROM estudiante WHERE numeroAlumno= ?;";
                $sql=$conectar->prepare($sql);
                $sql->bindValue(1,$numeroAlumno);
                $sql->execute();
                return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }
?>