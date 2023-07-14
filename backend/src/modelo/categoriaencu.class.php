<?php

class Categoriaencu{

    public function __construct(){
        
    }
    public function nuevo($id, $NomEsp, $NomIng, $Descripcion, $idCues, $idTra){
        $q = "INSERT INTO categoriaencu (idCate, NomEsp, NomIng , Descripcion ,idCues ,idTra) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $NomEsp){
        $q = "UPDATE categoriaEncu SET NomESP='$NomEsp' WHERE idCate=$id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos() {
        $q = "SELECT * FROM categoriaencu ";
        $db = new Database();
        return $db->select($q);
    }

    public function categoriaencu ($id){
        $q ="SELECT * FROM categoriaEncu  WHERE idCate=$id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM categoriaencu  WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM categoriaencu  WHERE idCate=$id";

        $db = new Database();
        return $db->update($q);
    }
}
