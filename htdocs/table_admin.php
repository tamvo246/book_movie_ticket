<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/51703181-51703148/htdocs/model/DbHelper.php');
	$db=new DbHelper();
    $table_name=$_GET['table'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
    table, th, td{
        border-top:1px solid #ccc;
        border-bottom:1px solid #ccc;
    }
    table{
        border-collapse:collapse;
        table-layout: fixed;

    } 
    thead{
        font-weight: bold;
    }    
    
    </style>
</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <div class="group_table">
            <h1 class="my-4">Table</h1>
            <div class="list-group">
                <?php 
                	$item=$db->getTable()->fetchAll();
                	//print_r($item[0][0]);
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
        <div class="col-lg-9">
            <div class="name_table">
                <h1 class="my4"><?=$table_name?></h1>
                <table width="100%" border="1">
                <thead>
                </tr>
                    <?php
                    $field=$db->showField($table_name)->fetchAll(PDO::FETCH_ASSOC);
                    /*for($i=0;$i<count($field);$i++) {
                        echo"<td>{$field[$i]}</td>";
                    }*/
                    //print_r($field[1]['COLUMN_NAME']);
                    for($i=0;$i<count($field)/3;$i++){
                        echo "<td>{$field[$i]['COLUMN_NAME']}</td>";
                    }
                    ?>
                </tr>
                </thead>
                <tbody>     
                        
                <?php 
                    $table=$db->getData($table_name)->fetchAll();
                    for($i=0;$i<count($table);$i++) {
                        echo"<tr>";
                        for($j=0;$j<count($table[$i])/2;$j++){
                            echo  "<td>{$table[$i][$j]}</td>";
                        }
                        echo"</tr>";
                    }

                    
                ?>
                </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
            
    
</div>

</body>
</html>