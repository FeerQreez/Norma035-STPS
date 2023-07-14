<?php

class Acciones{

    public function __construct(){
        
    }
    public function nuevo($id_Acci, $Fecha, $indicaciones, $Fecha_Final, $resultado, $idTra){
        $A = "INSERT INTO acciones (id_Acci, Fecha, indicaciones , Fecha_Final ,resultado , idTra ,) VALUES(?,?,?,?,?,?,)";
        $db = new Database();
        return $db->update($A);
    }

    public function modificar($id_Acci, $Fecha){
        $A = "UPDATE acciones SET Fecha='$Fecha' WHERE id_Acci=$id_Acci";
        $db = new Database();
        return $db->update($A);
    }

    public function todos() {
        $A = "SELECT * FROM acciones";
        $db = new Database();
        return $db->select($A);
    }

    public function trabajador($id_Acci){
        $A ="SELECT * FROM acciones WHERE id_Acci=$id_Acci";
        $db = new Database();
        return $db->select($A);
    }

    public function buscar($params){
        $A = "SELECT * FROM acciones WHERE ";

        foreach($params as $key => $value){
            $A .= "$key='$value' and ";
        }
        $A .= "'%' like '%'";

        $db = new Database();
        return $db->select($A);
    }
    
    public function eliminar($id_Acci){
        $A = "DELETE FROM acciones WHERE id_Acci=$id_Acci";

        $db = new Database();
        return $db->update($A);
    }
}


