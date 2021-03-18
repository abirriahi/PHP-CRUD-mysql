<?php
/**
 * Created by PhpStorm.
 * User: abir
 * Date: 15/03/2021
 * Time: 13:00
 */
class  Database{

    private static $dbName = "formation_php" ;
    private static $dbHost = "localhost" ;
    private static $dbUsername = "root";
    private static $dbUserPassword ="";

    private static $cont  = null;

    public function __construct() {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        // One connection through whole application
        if ( null == self::$cont )
        {
            try
            {
                self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
