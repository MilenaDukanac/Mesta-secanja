<?php

interface ConnectionData{
    const username = 'root';
    const password = '';
    const host = 'localhost';
    const db_name = 'centralcemeteries';
};

class PDO_DB implements ConnectionData{

    private static $db = null;

    private function __construct(){
    }

    private function __clone(){
    }

    private function __wakeup(){
    }


    public static function getConnectionInstance(){
        if(self::$db==null){
            self::$db = new PDO_DB();
            self::$db = new PDO('mysql:'.ConnectionData::host.';dbname='.ConnectionData::db_name, ConnectionData::username, ConnectionData::password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

        return self::$db;
    }

    /*
    public static function disconnect(){
        self::$db=null;
    } */

}
$con = PDO_DB::getConnectionInstance();



?>
