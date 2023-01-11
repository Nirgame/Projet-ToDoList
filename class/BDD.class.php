<?php
class BDD implements BDD_int{

    private $connexion;

    function __construct()
    {
        $Server = "localhost";
        $DB = "mytodolist";
        $User = "Brown";
        $Pass = "Florian59cb";
        return $this->connexion($Server,$DB,$User,$Pass);
    }

    function connexion($Server,$DB,$User,$Pass){
        try {
            $this->connexion = new PDO("mysql:host=".$Server.";dbname=".$DB,$User,$Pass);
            return $this->connexion;
        } catch(PDOException $e){
            log::directWriteLog("./Logs/LogBDD.txt",$e->getMessage());
            die();
        } catch(Exception $e){
            log::directWriteLog("./Logs/Log.txt",$e->getMessage());
            die();
        }
    }

    function __destruct()
    {
        $this->connexion = null ;
    }

    public function Withoutreturn ($req,$param=null) {
        
        $login = $this->connexion;
        try {
            $res = $login->prepare($req);
            if ($param === null || $param === ""){

                $res->execute();

            }
            else {

                $res->execute($param);

            }
            

        } catch(PDOException $e){
            log::directWriteLog("./Logs/LogBDD.txt",$e->getMessage());
            die();
        } catch(Exception $e){
            log::directWriteLog("./Logs/Log.txt",$e->getMessage());
            die();
        }

    }

    public function Withreturn ($req,$param=null) {
        
        $login = $this->connexion;
        try {
            
            $res = $login->prepare($req);
            if ($param === null || $param === ""){
                $res->execute();
                $data = $res->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            
            else {
                
                $res->execute($param);
                $data = $res->fetchAll(PDO::FETCH_ASSOC);
                return $data;

            }
            
        } catch(PDOException $e){
            log::directWriteLog("./Logs/LogBDD.txt",$e->getMessage());
            die();
        } catch(Exception $e){
            log::directWriteLog("./Logs/Log.txt",$e->getMessage());
            die();
        }

    }

}