
<?php

class Colonia{

    public function __construct(){
        
    }
    public function nuevo($id, $nombreCol){
        $col = "INSERT INTO colonia (idCol, NomCol) VALUES(?,?)";
        $db = new Database();
        return $db->update($col);
    }

    public function modificar($id, $nombreCol){
        $col = "UPDATE colonia SET NomCol ='$nombreCol' WHERE idCol=$id";
        $db = new Database();
        return $db->update($col);
    }

    public function todos() {
        $col = "SELECT * FROM colonia";
        $db = new Database();
        return $db->select($col);
    }

    public function colonia($id){
        $col ="SELECT * FROM colonia WHERE idCol=$id";
        $db = new Database();
        return $db->select($col);
    }

    public function buscar($params){
        $col = "SELECT * FROM colonia WHERE ";

        foreach($params as $key => $value){
            $col .= "$key='$value' and ";
        }
        $col .= "'%' like '%'";

        $db = new Database();
        return $db->select($col);
    }
    
    public function eliminar($id){
        $col = "DELETE FROM colonia WHERE idCol=$id";

        $db = new Database();
        return $db->update($col);
    }
}


