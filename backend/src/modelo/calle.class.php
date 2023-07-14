
<?php

class Calle{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $q = "INSERT INTO calle (idCal, NomCalle) VALUES('$id', '$nombre')";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $nombre){
        $q = "UPDATE calle SET NomCalle ='$nombre' WHERE idCal = $id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos() {
        $q = "SELECT * FROM calle";
        $db = new Database();
        return $db->select($q);
    }

    public function calle($id){
        $q ="SELECT * FROM calle WHERE idCal = $id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM calle WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM calle WHERE idCal=$id";

        $db = new Database();
        return $db->update($q);
    }
}
