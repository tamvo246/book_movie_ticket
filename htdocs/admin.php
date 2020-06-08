<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
	$db=new DbHelper();
    //$table_name=$_GET['table'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Table</h1>
            <div class="list-group">
                <?php 
                	$item=$db->getTable()->fetchAll();
                	//print_r($item);
                	for ($i=0;$i<count($item);$i++) {
                	
                ?>
                            <a href="table_admin.php?table=<?=$item[$i]['Tables_in_online_marketing_db']?>" class="list-group-item">
                            	<?=$item[$i]['Tables_in_online_marketing_db']?>
                            </a>
      
                <?php
                	}
                ?>


                
            </div>

        </div>
    </div>
    
</div>

</body>
</html>