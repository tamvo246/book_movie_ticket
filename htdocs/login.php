<?php
    ob_start();
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/AccountDb.php');

    if (isset($_SESSION['user'])) {
        header("Location: index.php");
    }

    $acc = new AccountDb();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>ĐĂNG NHẬP</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
      <link rel="stylesheet" href="css/style1.css">

  
</head>

<script>
    function showError() {
        $(".alert-danger").fadeIn(1500);
        setTimeout(function () {
            $(".alert-danger").fadeOut(3000);
        },3000);
    }
</script>

<body>
  <div class="login-page">
  <div class="form">

    <form class="login-form" method="post">
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="pass"/>
      <button>Đăng nhập</button>
      <p class="message">Đã có tài khoản <a href="register.php">Tạo tài khoản mới</a></p>
    </form>
  </div>

      <div class="alert alert-danger" style="text-align: center; display: none">
          <span>Sai username hoặc mật khẩu</span>
      </div>

</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>

  <?php

        if (isset($_POST['username']) && isset($_POST['pass'])) {

            $username = $_POST['username'];
            $pass = $_POST['pass'];

            $result = $acc->get($username, $pass);
            if ($result->status == Response::$SUCCESS) {
                if($username=="admin" && $pass=="1234"){
                  header("Location:admin.php");
                }
                //$result = json_decode(json_encode($result), True);
                else{
                  $_SESSION['user'] = $result->data;
                   header("Location:index.php");

                }
                
              
            }else if ($result->status == Response::$FAILED) {
                echo "<script>showError()</script>";
            }else{
                echo "<script>showError()</script>";
            }
        }

  ?>

</body>
</html>
