<?php

class AcoTrauma{

    public function __construct(){
        
    }
    public function nuevo($idTrau, $idTra,$Fecha, $Descripcion, $Consecuencias , $Recomendaciones, $idTraba){
        $Aco = "INSERT INTO aco_trauma (idTrau, idTra, Fecha, Descripcion, Consecuencias, Recomendaciones, idTraba) VALUES('$idTrau', '$idTra', '$Fecha', '$Descripcion','$Consecuencias','$Recomendaciones','$idTraba')";
        $db = new Database();
        return $db->update($Aco);
    }

    public function modificar($idTrau, $idTra){
        $Aco = "UPDATE aco_trauma  SET idTra ='$idTra' WHERE idDepar=$idTrau";
        $db = new Database();
        return $db->update($Aco);
    }

    public function todos() {
        $Aco = "SELECT * FROM aco_trauma";
        $db = new Database();
        return $db->select($Aco);
    }

    public function departamento($idTrau){
        $Aco ="SELECT * FROM aco_trauma WHERE idTrau=$idTrau";
        $db = new Database();
        return $db->select($Aco);
    }

    public function buscar($params){
        $Aco = "SELECT * FROM acotrauma WHERE ";

        foreach($params as $key => $value){
            $Aco .= "$key='$value' and ";
        }
        $Aco .= "'%' like '%'";

        $db = new Database();
        return $db->select($Aco);
    }
    
    public function eliminar($idTrau){
        $Aco = "DELETE FROM aco_trauma WHERE idTrau=$idTrau";

        $db = new Database();
        return $db->update($Aco);
    }
}
