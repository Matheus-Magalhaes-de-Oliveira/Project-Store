<?php

namespace App\Db;

class Conection{

    static $CONN;

    public static function getConection(){
        if(self::$CONN != null){
            return self::$CONN;
        }


        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "n2n";

        $con = new \mysqli($host, $user, $pass, $db);

        if($con->errno){
            throw new \Exception("error on connecting on database:" . $con->error);
        }

        return self::$CONN =$con;
    }
}

?>