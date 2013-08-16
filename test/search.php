<?php
$connection = mysql_connect('localhost', 'root', '');
$db = mysql_select_db('userdata', $connection);
$term = strip_tags(substr($_POST['searchit'],0, 100));
$term = mysql_escape_string($term); // Attack Prevention
//echo $term;exit;
if($term=="")
	echo "Enter Something to search";
else
{
	$sql="select * from userdetail where name like '{$term}%'";
	//echo $sql;exit;
	$query = mysql_query($sql);
	$string = '';
	if (mysql_num_rows($query)){
		while($row = mysql_fetch_assoc($query)){
			//echo "<pre>";print_r($row);echo"</pre>";exit;
			$string .= "<b>".$row['Name']."</b> - ";
			$string .= $row['Email']."</a>";
			$string .= "<br/>\n";
		}
	}
	else
	{
		$string = "No matches found!";
	}
echo $string;
}
?>
