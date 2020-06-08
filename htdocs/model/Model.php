<?php

    class Product{
        public $id;
        public $name;
        public $price;
        public $desc;
        public $vote;
        public $image;
        public $type;

        public function __construct($id, $name, $price, $desc, $vote, $image, $type)
        {
            $this->id = $id;
            $this->name = $name;
            $this->$price = $price;
            $this->desc = $desc;
            $this->vote = $vote;
            $this->image = $image;
            $this->type = $type;
        }
    }

    class Account{
        public $id;
        public $phone;
        public $name;
        public $pass;

        public function __construct($id,$phone, $name, $pass)
        {
            $this->id = $id;
            $this->phone = $phone;
            $this->name = $name;
            $this->pass = $pass;
        }
    }

    class Response{

        public static $SUCCESS = 1;
        public static $FAILED = 0;
        public static $ERROR = -1;

        public $status;
        public $message;
        public $data;

        public function __construct()
        {
        }

    }
    class BillDetail{
        public $product_id;
        public $quantity;
        public $user_id;
        public $date;
        public $total;
        public $combo;
        public $typeticket;
        public $screen;
        public function __construct($id,$product_id,$quantity,$user_id,$date,$total,$combo,$typeticket,$screen)
        {
            $this->id=$id;
            $this->product_id =$product_id ;
            $this->quantity = $quantity;
            $this->user_id =$user_id ;
            $this->date = $date;
            $this->total = $total;
            $this->combo =$combo ;
            $this->typeticket = $typeticket;
            $this->screen = $screen;
        }
    }
?>