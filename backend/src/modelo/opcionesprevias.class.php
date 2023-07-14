
<?php

class Opcionesprevias{

    public function __construct(){
        
    }
    public function nuevo($id, $opcionEsp, $OpcionIng, $idPre, $idCate, $idCues, $idTra){
        $q = "INSERT INTO Opcionesprevias (idPrevia, opcionEsp, OpcionIng ,idPre, idCate ,idCues, idTra) VALUES(?,?,?,?,?,?,?,?,?,?)";
        $db = new Database();
        return $db->update($q);
    }

    public function modificar($id, $opcionEsp){
        $q = "UPDATE Opcionesprevias SET opcionEsp ='$opcionEsp' WHERE idPrevia=$id";
        $db = new Database();
        return $db->update($q);
    }

    public function todos() {
        $q = "SELECT * FROM Opcionesprevias";
        $db = new Database();
        return $db->select($q);
    }

    public function Opcionesprevias($id){
        $q ="SELECT * FROM Opcionesprevias WHERE idPrevia=$id";
        $db = new Database();
        return $db->select($q);
    }

    public function buscar($params){
        $q = "SELECT * FROM Opcionesprevias WHERE ";

        foreach($params as $key => $value){
            $q .= "$key='$value' and ";
        }
        $q .= "'%' like '%'";

        $db = new Database();
        return $db->select($q);
    }
    
    public function eliminar($id){
        $q = "DELETE FROM Opcionesprevias WHERE idPrevia=$id";

        $db = new Database();
        return $db->update($q);
    }
}