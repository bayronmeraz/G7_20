<?php
class docente extends Conectar{

    public function get_docentes(){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM docente";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function get_docente($NumeroDocente){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM docente WHERE NumeroDocente = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $NumeroDocente);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_docente($NumeroDocente,$NombreDocente,$ApellidoDocente,$FechaContratacion,$DireccionDocente,$SalarioDoncente,$ProfesionDocente){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO docente(NumeroDocente,NombreDocente,ApellidoDocente,FechaContratacion,DireccionDocente,SalarioDoncente,ProfesionDocente) 
        VALUES(?,?,?,?,?,?,?);"; 
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NumeroDocente);
        $sql->bindValue(2,$NombreDocente);
        $sql->bindValue(3,$ApellidoDocente);
        $sql->bindValue(4,$FechaContratacion);
        $sql->bindValue(5,$DireccionDocente);
        $sql->bindValue(6,$SalarioDoncente);
        $sql->bindValue(7,$ProfesionDocente);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_docente($NumeroDocente,$NombreDocente,$ApellidoDocente,$FechaContratacion,$DireccionDocente,$SalarioDoncente,$ProfesionDocente){
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE docente SET NombreDocente= ?, ApellidoDocente= ?, FechaContratacion= ?, DireccionDocente= ?, SalarioDoncente= ?, ProfesionDocente= ?
        WHERE NumeroDocente = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NombreDocente);
        $sql->bindValue(2,$ApellidoDocente);
        $sql->bindValue(3,$FechaContratacion);
        $sql->bindValue(4,$DireccionDocente);
        $sql->bindValue(5,$SalarioDoncente);
        $sql->bindValue(6,$ProfesionDocente);
        $sql->bindValue(7,$NumeroDocente);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete_docente($NumeroDocente){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="DELETE FROM docente WHERE NumeroDocente= ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NumeroDocente);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }


}

 ?>