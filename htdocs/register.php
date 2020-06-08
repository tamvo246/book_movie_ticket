<?php
   require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/AccountDb.php');
   require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
   $acc = new AccountDb();
  if($_SERVER['REQUEST_METHOD']=='POST'){
      $user=$_POST['user'];
      $pass=$_POST['pass'];
      $phone=$_POST['phone'];  
      if(!is_numeric($phone)){
        $error='Điện thoại phải là số';
      }

      if(strlen($user)<4 or strlen($user)>30){
          $error='Tài khoản phải từ 4 đến 30 kí tự';
      }
      if(strlen($pass)<6 or strlen($pass)>30){
        $error='Mật khẩu phải từ 6 đến 30 kí tự';
      }
      if(empty($user) or empty($pass) or empty($phone)){
          $error='Không được để trống tên tài khoản, mật khẩu, sđt';
      }
      if(!isset($error)){
        $result = $acc->check_user($user);
        $re=$acc->check_phone($phone);
        if ($result->status == Response::$SUCCESS ) {
                $error='Tài khoản này đã tồn tại ';
            }
        if($re->status == Response::$SUCCESS){
              $error=' Số điện thoại này đã tồn tại';
        }
        else{
            $insert=$acc->insert(rand(),$user,$pass,$phone);
            $error='Đăng kí thành công';
        }   
        
      }
      
      
  }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ĐĂNG KÍ</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
      <link rel="stylesheet" href="css/style1.css">

  
</head>

<body>
  <div class="login-page">
  <div class="form">

    <form class="login-form" method="post">
      <input type="text" placeholder="phone" name="phone"/>
      <input type="password" placeholder="password" name="pass"/>
      <input type="text" placeholder="user name" name="user"/>
      <button >ĐĂNG KÍ</button>
      <p class="message"> <a href="login.php">Quay lại đăng nhập</a></p>
    </form>
      <?php
  if(isset($error)){
    if($error=='Đăng kí thành công'){
    echo "<span style='color:green;text-align:center'>{$error}</span>";
  }else{
    echo "<span style='color:red;text-align:center'>{$error}</span>";
  }
}
?>
  </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
</body>
</html>
