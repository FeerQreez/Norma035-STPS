<?php

class Trabajador{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $q = "INSERT INTO trabajador (idTra, NombreTra, ApePater , Ape_Mate ,RFC , CURP ,Fecha_Ingreso, Fecha_Salida ,idDire ,idDepar) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $nombre){
        $q = "UPDATE trabajador SET NombreTra='$nombre' WHERE idTra=$id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos() {
        $q = "SELECT * FROM trabajador";
        $db = new Database();
        return $db->select($q);
    }

    public function trabajador($id){
        $q ="SELECT * FROM trabajador WHERE idTra=$id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM trabajador WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM trabajador WHERE idTra=$id";

        $db = new Database();
        return $db->update($q);
    }
}


