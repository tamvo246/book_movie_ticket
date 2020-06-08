<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/Model.php');


    class ProductDb{

        public $db;

        public function __construct()
        {
            $this->db = DbHelper::getInstance();
        }

        public function getAll(){

            $response = new Response();
            try{
                $sql = "select * from product";
                $param = array();

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Truy vấn thông tin không thành công";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result;
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }

       public function getProductById($id){

            $response = new Response();
            try{
                $sql = "select * from product where type = ?";
                $param = array($id);

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Truy vấn thông tin không thành công";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result;
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }
        public function getProduct($id){

            $response = new Response();
            try{
                $sql = "select * from product where id = ?";
                $param = array($id);

                $result = $this->db->get($sql, $param);

                if ($result == Response::$FAILED){
                    $response->status = Response::$FAILED;
                    $response->message = "Truy vấn thông tin không thành công";
                }else{
                    $response->status = Response::$SUCCESS;
                    $response->message = "Truy vấn thành công";
                    $response->data = $result;
                }
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }


    }
?>