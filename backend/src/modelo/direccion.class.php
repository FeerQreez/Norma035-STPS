<?php

class Direccion{

    public function __construct(){
        
    }
    public function nuevo($idDire, $idCal, $idCol){
        $dire = "INSERT INTO direccion (idDire, IdCal, idCol) VALUES('$idDire', '$idCal','$idCol')";
        $db = new Database();
        return $db->update($dire);
    }

    public function modificar($id, $nombre){
        $dire = "UPDATE direccion SET idCal='$nombre' WHERE idDire=$id";
        $db = new Database();
        return $db->update($dire);
    }

    public function todos(){
        $dire = "SELECT * FROM direccion";
        $db = new Database();
        return $db->select($dire);
    }

    public function direccion($id){
        $dire ="SELECT * FROM direccion WHERE idDire=$id";
        $db = new Database();
        return $db->select($dire);
    }

    public function buscar($params){
        $dire = "SELECT * FROM direccion WHERE ";

        foreach($params as $key => $value){
            $dire .= "$key='$value' and ";
        }
        $dire .= "'%' like '%'";

        $db = new Database();
        return $db->select($dire);
    }
    
    public function eliminar($id){
        $dire = "DELETE FROM direccion WHERE idDire=$id";

        $db = new Database();
        return $db->update($dire);
    }
}
