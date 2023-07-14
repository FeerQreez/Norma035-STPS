<?php

class Pregunta{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $pr = "INSERT INTO pregunta (idPre, preguntaEsp, PreguntaIng , TipoRespuesta ,TipoSeleccion , Requi_Aclara, AclaraEsp, AclaraIng ,Pausa ,idCate, idCues) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)";
        $db = new Database();
        return $db->update($pr);
    }

    public function modificar($id, $nombre){
        $pr = "UPDATE pregunta SET NombreTra='$nombre' WHERE idTra=$id";
        $db = new Database();
        return $db->update($pr);
    }

    public function todos() {
        $pr = "SELECT * FROM pregunta";
        $db = new Database();
        return $db->select($pr);
    }

    public function pregunta($id){
        $pr ="SELECT * FROM pregunta WHERE idTra=$id";
        $db = new Database();
        return $db->select($pr);
    }

    public function buscar($params){
        $pr = "SELECT * FROM pregunta WHERE ";

        foreach($params as $key => $value){
            $pr .= "$key='$value' and ";
        }
        $pr .= "'%' like '%'";

        $db = new Database();
        return $db->select($pr);
    }
    
    public function eliminar($id){
        $pr = "DELETE FROM pregunta WHERE idTra=$id";

        $db = new Database();
        return $db->update($pr);
    }
}

