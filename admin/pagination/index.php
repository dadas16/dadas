<?php
/**
 * @link: http://www.Awcore.com/dev
 */
    //connect to the database
    include_once ('db.php'); 
    //get the function
    include_once ('function.php');

    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 2;
    	$startpoint = ($page * $limit) - $limit;
        
        //to make pagination
        //$statement = "`records` where `active` = 1";
        $statement = "participant";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <title>Pagination</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="css/pagination.css" rel="stylesheet" type="text/css" />
	<!--<link href="css/grey.css" rel="stylesheet" type="text/css" />-->
	<link href="css/C_green.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .records {
            width: 510px;
            margin: 5px;
            padding:2px 5px;
            border:1px solid #B6B6B6;
        }
        
        .record {
            color: #474747;
            margin: 5px 0;
            padding: 3px 5px;
        	background:#E6E6E6;  
            border: 1px solid #B6B6B6;
            cursor: pointer;
            letter-spacing: 2px;
        }
        .record:hover {
            background:#D3D2D2;
        }
        
        
        .round {
        	-moz-border-radius:8px;
        	-khtml-border-radius: 8px;
        	-webkit-border-radius: 8px;
        	border-radius:8px;    
        }    
        
        p.createdBy{
            padding:5px;
            width: 510px;
        	font-size:15px;
        	text-align:center;
        }
        p.createdBy a {color: #666666;text-decoration: none;}        
    </style>    
</head>

<body>

    <div class="records round">
        <?php
            //show records
			$sql="SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}";
            //echo $sql;//exit;
			
			$query = mysql_query($sql);
            
        	while ($row = mysql_fetch_assoc($query)) 
			{
        ?>
            <div class="record round"><?php echo "{$row['idParticipant']}#{$row['countryName']}";?></div>
        <?php    
            }
        ?>
    </div>

<?php
	echo pagination($statement,$limit,$page);
?>
<p class="createdBy record round">
    <a href="http://www.awcore.com/dev/1/3/Create-Awesome-PHPMYSQL-Pagination_en">Read & Download on Advanced Web Core »</a>
</p>
</body>
</html>