<?php

class Cuestionario{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $q = "INSERT INTO cuestionario (idCues, Fecha , Nombre , Objetivo, Descripcion , Agradecimiento , estatus  , idTra  ) VALUES('$id', '$nombre')";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $nombre){
        $q = "UPDATE cuestionario SET Nombre='$nombre' WHERE idCues=$id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos(){
        $q = "SELECT * FROM cuestionario";
        $db = new Database();
        return $db->select($q);
    }

    public function departamento($id){
        $q ="SELECT * FROM cuestionario WHERE idDepar=$id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM cuestionario WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM cuestionario WHERE idCues=$id";

        $db = new Database();
        return $db->update($q);
    }
}
