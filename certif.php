<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENA</title>
   <div >  
    
    <?
	$id=$_GET["id"] ;//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
	mysql_connect("localhost","root","");
	$db = mysql_select_db("fcontinue");
	mysql_query($db);
	
		
		$sql="SELECT participant.idParticipant,participant.Nom,participant.note,participant.code,module.nom as Nom_cours,module.code,module.dure FROM participant  LEFT JOIN module ON module.code = participant.code";
	$execsele=mysql_query($sql);
	echo"<table width=100% border=1>";
	while($ligne=mysql_fetch_array($execsele))
	{ 
	if (note>50)
	{
	?>
	
	<tr><td><img src="images/image1.jpg" width=100% height=10></td><td rowspan=3><img src="images/image2.jpg" width=10 height=100%></td></tr>
	<tr><td>
<div align ="center"><h1><font color="green"><B>REPUBLIQUE DU BURUNDI</B></font></h1> <br/>
<img src="images/logo.gif" width=200 height=100><br/>
<h1><font color="black"><B>CERTIFICAT</B></font></h1> <br/>
<font color="black"><B>L'Ecole Nationale d'Administration atteste que</B></font> <br/>




</div>

<BR/><BR/>
 <font size="5">Mr,Mme,Mlle <?echo"<b>". $ligne['Nom']." ".$ligne['Prenom']."</b>";?> a participé à la formation sur <? echo $ligne['Nom_cours'];?> d'un volume de <? echo $ligne['dure'];?> qui a lieu à Bujumbura du <?echo $ligne['Nom'];?> au  <?echo $ligne['Nom'];?> <br/>

</font>
</td></tr>
<tr><td><img src="images/image1.jpg"  width=100% height=10></td></tr>
 

</table>

<?} else {
	
	?>
	
	<tr><td><img src="images/image1.jpg" width=100% height=10></td><td rowspan=3><img src="images/image2.jpg" width=10 height=100%></td></tr>
	<tr><td>
<div align ="center"><h1><font color="green"><B>REPUBLIQUE DU BURUNDI</B></font></h1> <br/>
<img src="images/logo.gif" width=200 height=100><br/>
<h1><font color="black"><B>ATTESTATION</B></font></h1> <br/>
<font color="black"><B>L'Ecole Nationale d'Administration atteste que</B></font> <br/>




</div>

<BR/><BR/>
 <font size="5">Mr,Mme,Mlle <?echo"<b>". $ligne['Nom']." ".$ligne['Prenom']."</b>";?> a participé à la formation sur <? echo $ligne['Nom_cours'];?> d'un volume de <? echo $ligne['dure'];?> qui a lieu à Bujumbura du <?echo $ligne['Nom'];?> au  <?echo $ligne['Nom'];?> <br/>

</font>
</td></tr>
<tr><td><img src="images/image1.jpg"  width=100% height=10></td></tr>
 

</table>
	
	
	
	
	
	
	
	
	
	
	
	<?}}?>
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    		
</body>
</html>