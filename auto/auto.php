<?php
include 'config.php';
$db = mysql_connect($hostname,$username,$password);
mysql_select_db($dbname,$db);
$value=$_POST['str'];
$idd=$_POST['idd1'];
$getcntry=mysql_query("select * from $tablename where $fieldname like '$value%'");
if($getcntry)
{
    $k=1;
       while($row= mysql_fetch_array($getcntry))
	    { 
	         $result=$row[1];
	        $keyval=$keyval."##".$result;
	        
              echo '<li onClick="fill(\''.$result.'\',\''.$idd.'\');"  id="'.$k.'"  onmouseover="changeclass('.$k.')" onmouseout="changeclass1('.$k.')">'.$result.'</li>';
             $k++;
         }
}
?>
<input type='hidden' value="<?php echo $keyval;?>" id='arrcntry'>
