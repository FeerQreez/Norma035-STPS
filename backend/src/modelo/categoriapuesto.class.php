<?php

class CategoriaPuesto{

    public function __construct(){
        
    }
    public function nuevo($idCatepu, $nomCata, $idPuesto){
        $catpues = "INSERT INTO categoriapuesto (idCatePu, NomCata, idPuesto) VALUES('$idCatepu', '$nomCata', '$idPuesto')";
        $db = new Database();
        return $db->update($catpues);
    }

    public function modificar($idCatepu, $nomCata ,$idPuesto){
        $catpues = "UPDATE categoriapuesto SET NomCata='$nomCata' WHERE idCatePu=$idCatepu";
        $db = new Database();
        return $db->update($catpues);
    }

    public function todos() {
        $catpues = "SELECT * FROM categoriapuesto";
        $db = new Database();
        return $db->select($catpues);
    }

    public function categoriaPuesto($idCatePu){
        $catpues ="SELECT * FROM categoriapuesto WHERE idPuesto=$idCatePu";
        $db = new Database();
        return $db->select($catpues);
    }

    public function buscar($params){
        $catpues = "SELECT * FROM categoriapuesto WHERE ";

        foreach($params as $key => $value){
            $catpues .= "$key='$value' and ";
        }
        $catpues .= "'%' like '%'";

        $db = new Database();
        return $db->select($catpues);
    }
    
    public function eliminar($idCatepu){
        $catpues = "DELETE FROM categoriapuesto WHERE idPuesto=$idCatepu";

        $db = new Database();
        return $db->update($catpues);
    }
}
