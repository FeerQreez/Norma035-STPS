<?php

class Departamento{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $q = "INSERT INTO departamento (idDepar, Nombre_Depa) VALUES('$id', '$nombre')";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $nombre){
        $q = "UPDATE departamento SET Nombre_Depa='$nombre' WHERE idDepar=$id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos() {
        $q = "SELECT * FROM departamento";
        $db = new Database();
        return $db->select($q);
    }

    public function departamento($id){
        $q ="SELECT * FROM departamento WHERE idDepar=$id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM departamento WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM departamento WHERE idDepar=$id";

        $db = new Database();
        return $db->update($q);
    }
}
