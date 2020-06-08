<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/Model.php');


    class AccountDb{

        public $db;

        public function __construct()
        {
            $this->db = DbHelper::getInstance();
        }

        public function get($username, $pass){

            $response = new Response();
            try{
                $sql = "select * from account where name = ? and pass = ?";
                $param = array($username, $pass);

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Sai username hoặc mật khẩu";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result[0];
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }

        public function check_user($name){

            $response = new Response();
            try{
                $sql = "select * from account where name=?";
                $param = array($name);

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Sai username hoặc mật khẩu";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result[0];
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }
        public function check_phone($phone){

            $response = new Response();
            try{
                $sql = "select * from account where phone=?";
                $param = array($phone);

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Sai username hoặc mật khẩu";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result[0];
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }
        public function insert($id,$phone,$name,$pass){
                $response = new Response();
            try{
                $sql = "insert into account values(?,?,?,?) ";
                $param=array($id,$phone,$name,$pass);
                $this->db->insert($sql,$param);
                
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }
        public function showFiled($table_name){
            $sql=("SHOW COLUMNS FROM ".$table_name);
            $command=$this->conn->prepare($sql);
            $stmt=$command->execute();
            return $command;
        }


    }
?>