<?php
class Database{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '12345';
    private $port = '3306';
    private $dbName = 'nom035';
    private $mysqlCon;

    public function __construct(){
        $stringCon = "mysql:host=$this->host;dbname=$this->dbName;port=$this->port";
        $this->mysqlCon = new PDO($stringCon, $this->user, $this->pass);
        $this->mysqlCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->mysqlCon->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function update($q){
        try{
            $resultado = $this->mysqlCon->query($q);
            if($resultado){
                return $resultado->rowCount();
            }
            return $resultado->errorInfo()[2];
        }
        catch(PDOException $e){
            return '{"error:{"text": "'. $e->getMessage() .'"}}';
        }
    }
    public function insert_id($q){
        try{
            $resultado = $this->mysqlCon->query($q);
            if($resultado){
                return $this->mysqlCon->lastInsertId();
            }
            return $resultado->errorInfo()[2];
        }
        catch(PDOException $e){
            return '{"error:{"text": "'. $e->getMessage() .'"}}';
        }
    }
    public function select($q){
        $resp = [];
        try{
            $resultado = $this->mysqlCon->query($q);
            if($resultado->rowCount() > 0){
                $resp = [
                    "status" => "OK",
                    "codigo" => "200",
                    "datos" => $resultado->fetchAll(PDO::FETCH_OBJ),
                    "mensaje" => "OK"
                ];
            }else{
                $resp = [
                    "status" => "OK",
                    "codigo" => "200",
                    "datos" => [],
                    "mensaje" => $resultado->errorInfo()[2]
                ];
            }
            return $resp;
        }
        catch(PDOException $e){
            $resp = [
                "status" => "error",
                "codigo" => "500",
                "datos" => $e->getMessage(),
                "mensaje" => $e->getMessage()
            ];
            return $resp;
        }
    }

}
?>