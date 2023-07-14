<?php

class Usuario{

    public function __construct(){
        
    }
    public function nuevo($Correo, $Password ,$Nombre){
        $u = "INSERT INTO usuario (Correo, Password , Nombre) VALUES('$Correo', '$Password','$Nombre')";
        $db = new Database();
        return $db->update($u);
    }

    public function modificar($Correo, $Password, $Nombre){
        $u = "UPDATE usuario SET Nombre_Usr='$Nombre' WHERE correo=$Correo";
        $db = new Database();
        return $db->update($u);
    }

    public function todos(){
        $u = "SELECT * FROM usuario";
        $db = new Database();
        return $db->select($u);
    }

    public function departamento($id){
        $u ="SELECT * FROM usuario WHERE Correo=$id";
        $db = new Database();
        return $db->select($u);
    }

    public function buscar($u, $params){
        $u = "SELECT * FROM usuario WHERE ";

        foreach($params as $key => $value){
             $u .= "$key='$value' and ";
        }
        $u .= "'%' like '%'";

        $db = new Database();
        return $db->select($u);
    }
    
    public function eliminar($id){
        $u = "DELETE FROM usuario WHERE correo=$id";

        $db = new Database();
        return $db->update($u);
    }
}
