<?php

class Puesto{

    public function __construct(){
        
    }
    public function nuevo($Correo, $Password ,$Nombre){
        $p = "INSERT INTO puesto (idPuesto, NomPues , idDepar) VALUES('?', '?','?')";
        $db = new Database();
        return $db->update($p);
    }

    public function modificar($idPuesto, $NomPues, $idDepar){
        $p = "UPDATE puesto SET Nombre_Pues='$NomPues' WHERE idDepar=$idDepar";
        $db = new Database();
        return $db->update($p);
    }

    public function todos(){
        $p = "SELECT * FROM puesto";
        $db = new Database();
        return $db->select($p);
    }

    public function departamento($id){
        $p ="SELECT * FROM puesto WHERE idDepar=$id";
        $db = new Database();
        return $db->select($p);
    }

    public function buscar($p, $params){
        $p = "SELECT * FROM puesto WHERE ";

        foreach($params as $key => $value){
             $p .= "$key='$value' and ";
        }
        $p .= "'%' like '%'";

        $db = new Database();
        return $db->select($p);
    }
    
    public function eliminar($id){
        $p = "DELETE FROM puesto WHERE idDepar=$id";

        $db = new Database();
        return $db->update($p);
    }
}
