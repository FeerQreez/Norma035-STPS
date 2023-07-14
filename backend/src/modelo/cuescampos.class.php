<?php
/*
class Cuestionario{

    public function __construct(){
        
    }
    public function nuevo($idCampo, $idCues, $idTra,){
        $cue = "INSERT INTO cuescampos (idCampo, idCues , idTra ,  ) VALUES('$idCampo', '$idCues','$idTra')";
        $db = new Database();
        return $db->update($cue);
    }

    public function modificar($idCampo, $nombre){
        $cue = "UPDATE cuescampos SET Nombre='$nombre' WHERE idCues=$idCampo";
        $db = new Database();
        return $db->update($cue);
    }

    public function todos(){
        $cue = "SELECT * FROM cuescampos";
        $db = new Database();
        return $db->select($cue);
    }

    public function departamento($idCampo){
        $cue ="SELECT * FROM cuescampos WHERE idCampo=$idCampo";
        $db = new Database();
        return $db->select($cue);
    }

    public function buscar($params){
        $cue = "SELECT * FROM cuescampos WHERE ";

        foreach($params as $key => $value){
            $cue .= "$key='$value' and ";
        }
        $cue .= "'%' like '%'";

        $db = new Database();
        return $db->select($cue);
    }
    
    public function eliminar($id){
        $cue = "DELETE FROM cuescampos WHERE idCues=$idCampo";

        $db = new Database();
        return $db->update($cue);
    }
}
*/