<?php
    session_start();

    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/CategoryDb.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/ProductDb.php');
    $cat = new CategoryDb();
    $pro = new ProductDb();
    $id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thông tin phim</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Đặt vé online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php

                    if (isset($_SESSION['user'])) {

                        $user = $_SESSION['user'];

                        ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><?= $user['name']?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Logout</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="profile.php">Lịch sử mua hàng</a>
                                </li>

                        <?php

                    }else{
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        <?php
                    }
                ?>

            </ul>
        </div>
    </div>
</nav>
    <div class="container" style="margin-top: 5px">
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
                        $dayopen=$item['dateopen'];
                        $trailer=$item['trailer'];
                    }
        ?>          
    <div class="row">

        <div class="col-lg-3">
            <img class="image"src="<?= $image?>" style="height: 400px;width: 250px">
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12 col-md-4 mb-4">
                <h6> Tên phim : <?=$name?></h6>
                <h6> Đánh giá phim : 
                                            <?php
                                                for ($i = 1; $i <= $vote; $i++ ){
                                                    echo "&#9733";
                                                }
                                                for ($i = 1; $i <= (5-$vote); $i++ ){
                                                    echo "&#9734";
                                                }
                                            ?>
                </h6>
                <h6>Ngày ra mắt : <?=$dayopen?> </h6>
                <h6>Giá vé : <?= number_format($price,0)." VND";?></h6>
                <h6>Mô tả phim : <?=$description?></h6>
                <h6>Xem trailer bên dưới</h6>
            </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
    </div>
    <!-- /.row -->

</div>

<div style="margin-top: 5px;margin-left: 50px">
    <video controls>
        <source src="<?=$item['trailer']?>" type="video/mp4" media="">
    </video>    
</div>
<footer class="py-5 bg-dark" style="margin-bottom: 0px">
    
</style>>
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
