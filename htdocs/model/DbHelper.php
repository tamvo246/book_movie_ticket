<?php

    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_DATABASE", "online_marketing_db");


    class DbHelper{

        private static $instance;
        public $conn;

        public function __construct() {
            $this->conn = new PDO("mysql:host=" .DB_HOST. ";dbname=" .DB_DATABASE, DB_USER, DB_PASSWORD);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }

        public static function getInstance(){
            if (self::$instance == null) {
                self::$instance = new DbHelper();
            }
            return self::$instance;
        }

        function __destruct() {
            $this->conn = null;
        }

        function close(){
            $this->conn = null;
        }

        function getConnection(){
            return $this->conn;
        }

        public function get($sql, $param){

            try{

                $command = $this->conn->prepare($sql);
                $status = $command->execute($param);

                if ($status && $command->rowCount() > 0){
                   return $command->fetchAll();
                }
                else return Response::$FAILED;

            }catch(PDOException $e) {

                throw $e;
            }
        }
        public function insert($sql, $param){
                $command = $this->conn->prepare($sql);
                $status = $command->execute($param);
                

        }
        public function getTable(){
            $sql="SHOW TABLES FROM online_marketing_db";
            $command=$this->conn->prepare($sql);
            $stmt=$command->execute();
            //$result=$command->fetchAll();
            return $command;
        }
        public function getData($table_name){
            $sql=("select * from ".$table_name);
            $command=$this->conn->prepare($sql);
            $stmt=$command->execute();
            return $command;
        }
        public function showField($table_name){
            $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name = ? ";
            $param=array($table_name);
            $command=$this->conn->prepare($sql);
            $stmt=$command->execute($param);
            return $command;
        }

    }



?>
