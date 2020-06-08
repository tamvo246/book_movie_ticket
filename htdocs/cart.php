<?php
    ob_start();
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/ProductDb.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/CategoryDb.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/BillDetailDb.php');
    $pro = new ProductDb();
    $cat =new CategoryDb();
    
    $id=$_GET['id'];
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<style>

</style>
<div class="container">
    <h2>Giỏ hàng</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <td colspan="7">
                <form action="index.php" method="get" accept-charset="utf-8">
                    <button type="submit" class="btn btn-primary">Tiếp tục mua vé</button>
                </form>
                
            </td>
        </tr>
        <tr>
            <th>Ảnh</th>
            <th>STT</th>
            <th>Tên phim</th>
            <th>Số lượng</th>
            <th>Loại vé</th>
            <th>Combo</th>
            <th>Suất chiếu</th>
            <th>Giá vé</th>
            <th>Xóa</th>
        </tr>
        </thead>
         <tbody>
            
        <form method="POST">
         <?php
                    setlocale(LC_MONETARY,"en_US");
                    $products = $pro->getProduct($id)->data;
                    $stt=1;
                    foreach ($products as $item){
                        $id= $item['id'];
                        $name = $item['name'];
                        $image = $item['image'];
                        $price = $item['price'];
                        $description = $item['description'];
                        $vote = $item['vote'];
                        $idPro=$item['id'];
                        $sl=1;
                        $tt=number_format($price*$sl,0)." VND";
                        $pice=number_format($price,0)." VND";
                        echo"<tr>

            <td><img src={$image} style='max-height: 50px'></td>
            <td>{$id}</td>
            <td>{$name}</td>
            <td><input type='number' value='1' name='sl'></td>
            <td><select name='loai'>
                <option>2D</option>
                <option>3D</option>
                <option>4D</option>
            </select></td>
             <td>
             <select name='combo'>
                <option>Không</option>
                <option>Bắp</option>
                <option>Nước</option>
                <option>Bắp+Nước</option>
            </select>
            </td>
            </select></td>
             <td>
             <select name='screen'>
                <option>5h-7h</option>
                <option>6h-8h</option>
                <option>7h30-9h30</option>
            </select>
            </td>

            <td>{$tt}</td>
            <td><button type='button' class='btn btn-danger'>Xóa</button></td>
            </tr>";
        
        }
        ?>
        <?php
        $billDt=new BillDetailDb();
        if (isset($_SESSION['user'])) {

                        $user = $_SESSION['user'];
                        /*echo "<pre>";
                        print_r($user);
                        echo "</pre>";*/
                        if($_SERVER['REQUEST_METHOD']=='POST'){
                        $product_id=$id;
                        $quantity=$_POST['sl'];
                        $user_id=$user['id'];
                        $date=date('y-m-d');
                        $total=$price;
                        $combo=$_POST['combo'];
                        $typeticket=$_POST['loai'];
                        $screen=$_POST['screen'];
                        $insert=$billDt->insert(rand(),$product_id,$quantity,$user_id,$date,$total,$combo,$typeticket,$screen);
                    }

          }
            
        ?>
        <tr>
            <td colspan="9" style="text-align: right">
                <?php
                if (isset($_SESSION['user'])) {
                 ?>
                 <button type="submit" class="btn btn-success" name="btncapnhat">Cập nhật giỏ hàng</button>
                 <?php   
                } else {
                    ?>
                    <a href="login.php" class="btn btn-success">Login</a>
                    <?php
                }
                ?>
                
                
                <button type="button" class="btn btn-danger">Thanh toán</button>
            </td>
        </tr>

        </form>
        </tbody>
    </table>
</div>
</body>
</html>