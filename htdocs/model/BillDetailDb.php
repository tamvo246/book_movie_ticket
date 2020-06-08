<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/Model.php');


     class BillDetailDb{

        public $db;

        public function __construct()
        {
            $this->db = DbHelper::getInstance();
        }
        public function insert($id,$product_id,$quantity,$user_id,$date,$total,$combo,$typeticket,$screen){
                $response = new Response();
            try{
                $sql = "insert into bill_details values(?,?,?,?,?,?,?,?,?)";
                $param=array($id,$product_id,$quantity,$user_id,$date,$total,$combo,$typeticket,$screen);
                $this->db->insert($sql,$param);
                
            }catch (Exception $e){

                $response->status = Response::$ERROR;
                $response->message = $e->getMessage();
            }

            return $response;
        }

        public function getBill($user_id){

            $response = new Response();
            try{
                $sql = "SELECT * FROM bill_details INNER JOIN product ON bill_details.product_id = product.id where user_id = ?";
                $param = array($user_id);

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