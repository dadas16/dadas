<?php
	session_start();
	include("includes/connect.php");  
	connect();
	$sql="SELECT Origine, DateFin FROM  participant";
	$sqlFormation="SELECT nom FROM  module";
	$query=mysql_query($sql);
	$query1=mysql_query($sqlFormation);
	
	if(isset($_POST['submit']))
	{
	
		foreach($_POST as $key => $value)
		{
			${$key}=mysql_real_escape_string(strip_tags(trim($value)));
		}
		if($critere == "formation")
		{
			$champ="module";
		}	
		else
		{
			$champ="demandeur";
		}	
		
		$table="demande";
		
		$requ="SELECT distinct ".$champ." FROM ".$table;
		
		//echo $requ;exit;
		
		$query=mysql_query($requ);
		$tableau=array();
		while($array=mysql_fetch_assoc($query))
		{
			foreach($array as $key => $value)
			{
				array_push($tableau,"$value");
			}
		}	
		//echo"<pre>";print_r($tableau);echo"</pre>";exit;
			$number=0;
			$min=$max=0;
			foreach($tableau as $value)
			{
				$requ1="SELECT count(*) as occurence FROM ".$table. " WHERE ".$champ." ='".$value."'";
				//echo $requ1." ";//exit;
				$queryCount=mysql_query($requ1);
				$num_rows=mysql_fetch_assoc($queryCount);
				$occurence=$num_rows['occurence'];
				//echo $occurence."<br/>";
				if($occurence > $max)	
				{
					$min=$occurence;
					$max=$occurence;
					$ref=$value;
				}
				if($occurence<$min)
				{
					$min=$occurence;
				}
				//echo $value."  a comme valeur maximale =".$max."<br/>";
			}
			//echo $min."<br/>";
			echo"Le module le plus demandé est $ref avec un nombre de fois de =".$max." par ".$champ." '" ;exit;	
	}	
?>
<html>
	<head>
		<script src='js/jquery.js'></script>
		<script type="text/javascript">
			/*$(document).ready(function(){
				$('#critere').change(function(){
					var critere=$(this).val();
						
					$.ajax({
						type:'POST',
						url:'search_critere.php',
						data:'critere='+critere,
						success:function(res){
								
							
						}	
					})
				});
			});*/
		
		</script>
	</head>
	<body>
		<form method="post" action="">
		<dl>
			<dd>Recherchée par :</dd>
			<dt>
					<select id='critere' name='critere'>	
						<option value='formation'>Module le plus demandé</option>
						<option value='entreprise'>Entreprise qui a demandée beacoup de formation</option>
						<option value='nombre'>Nombre de personnes formés</option>
						<option value='homme'>Nombre d'hommes formés</option>
						<option value='femme'>Nombre de femmes formés</option>
					</select>
			</dt>
		</dl>
		<dl>
			<dd></dd>
			<dt>
				<input type='text' id='rech' name=''/>
			</dt>
		</dl>
			<input type="submit" name="submit" id="Rechercher" value="Rechercher"/>
		</form>
		<?php
			
			if(isset($queryCount))
			{
				
			}
		?>
	</body>
</html>