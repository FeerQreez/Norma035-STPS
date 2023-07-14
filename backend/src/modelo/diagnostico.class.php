<?php

class Diagnostico{

    public function __construct(){
        
    }
    public function nuevo($id, $nombre){
        $diag = "INSERT INTO diagnostico (idDiag, Fecha, Resultado, Comentario, Recomendaciones , idTra) VALUES('?', '?', '?', '?', '?','?')";
        $db = new Database();
        return $db->update($diag);
    }

    public function modificar($id, $nombre){
        $diag = "UPDATE diagnostico SET Resultado='Resultado' WHERE idDiag=$id";
        $db = new Database();
        return $db->update($diag);
    }

    public function todos() {
        $diag = "SELECT * FROM diagnostico";
        $db = new Database();
        return $db->select($diag);
    }

    public function departamento($id){
        $diag ="SELECT * FROM diagnostico WHERE idDiag=$id";
        $db = new Database();
        return $db->select($diag);
    }

    public function buscar($params){
        $diag = "SELECT * FROM diagnostico WHERE ";

        foreach($params as $key => $value){
            $diag .= "$key='$value' and ";
        }
        $diag .= "'%' like '%'";

        $db = new Database();
        return $db->select($diag);
    }
    
    public function eliminar($id){
        $diag = "DELETE FROM diagnostico WHERE idDiag=$id";

        $db = new Database();
        return $db->update($diag);
    }
}
