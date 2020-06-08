<?php
    ob_start();
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/ProductDb.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/CategoryDb.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/BillDetailDb.php');
    $pro = new ProductDb();
    $cat =new CategoryDb(); 
    $bill = new BillDetailDb();
	$user = $_SESSION['user'];
    $listBill = $bill->getBill($user['id'])->data;

    
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
    <h2>Lịch sử mua hàng</h2>

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
            <th>Tên phim</th>
            <th>Số lượng vé</th>
            <th>Suất chiếu</th>
            <th>Loại vé</th>
            <th>Ngày đặt</th>
            <th>Combo</th>
        </tr>
        <?php       
        		/* $user = $_SESSION['user'];
   	 			$listBill = $bill->getBill($user['id']);
    			foreach ($listBill as $item) {
    				$name=$item['name'];
    				$sl=$item['quantity'];
    				$screen=$item['screen'];
    				$typeticket=$item['typeticket'];
    				$date=$item['date'];
    				$combo=$item['commbo'];

    			}*/
    	?>	
        <?php
foreach ($listBill as $item=>$value) {
    ?>
    <tr>
            <td><?= $value['name'] ?></td>
            <td><?= $value['quantity'] ?></td>
            <td><?= $value[' screen'] ?></td>
            <td><?= $value['typetickket'] ?></td>
            <td><?= $value['date'] ?></td>
            <td><?= $value['combo'] ?></td>
        </tr>
    <?php
    }
        ?>
        </thead>
    </table>
</div>
</body>
</html>