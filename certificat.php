<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENA</title>
 </head>
 <BODY .... onBlur="self.close();">
    <?
	$id=$_GET["id"] ;
	
	mysql_connect("127.0.0.1","root","");
		$db=mysql_select_db("fcontinue");
		mysql_query($db);
	include('includes/dateformat.inc.php');
		
 /*$sql="SELECT date,participantid,nomModule,nomFormateur,presence_mat_t1,presence_amidi_t1,somme_presence,code,dure FROM module LEFT OUTER JOIN sommepresence ON nomModule = code WHERE participantid = $id";
$objQuery = mysql_query($sql) or die ("Error Query [".$sql."]");
	
    while($ligne=mysql_fetch_object($objQuery))
		{
			$somme_absence = $ligne->somme_presence;
			$Prenom_Utilisateur = $ligne->dure;
			$Access_utiliateur = $ligne->nomModule;
			
		}*/
	
$sql="SELECT participant.idParticipant,participant.DateDebut,participant.DateFin,participant.Nom,participant.Prenom,participant.note,participant.code,module.nom as Nom_cours,module.code,module.dure FROM participant  LEFT JOIN module ON module.code = participant.code where participant.idParticipant=".$id;
	$objQuery = mysql_query($sql) or die ("Error Query [".$sql."]");
	$execsele=mysql_query($sql);
	echo"<table width=100% border=1>";
	while($ligne = mysql_fetch_array($execsele))
	{
		//echo"<pre>";print_r($ligne);echo"</pre>";exit;
		$datefrDebut=dateformat($ligne['DateDebut']);
		$datefrFin=dateformat($ligne['DateFin']);
		//echo $datefr;exit;
	if ($ligne['note']>10)
	{
	?>
	<input type="button" value="Imprimer" onclick="window.print()">
	<tr><td rowspan=3><img src="images/right.jpg" width=100% height=580></td><td><img src="images/right.jpg" width=100% height=10></td><td rowspan=3><img src="images/right.jpg" width=100% height=580></td></tr>
	<tr><td>
<div align ="center"><h1><font color="green"><B>REPUBLIQUE DU BURUNDI</B></font></h1> <br/>
<img src="images/logo.gif" width=200 height=100><br/>
<h1><font color="black"><B>CERTIFICAT</B></font></h1> <br/>
<font color="black"><B>L'Ecole Nationale d'Administration atteste que</B></font> <br/>




</div>

<BR/><BR/>
 <font size="5">Mr,Mme,Mlle <?echo"<b>". $ligne['Nom']." ".$ligne['Prenom']."</b>";?> a participé à la formation sur <? echo $ligne['Nom_cours'];?> d'un volume de <? echo $ligne['dure'];?>H qui a lieu à Bujumbura du <?echo $datefrDebut;?> au  <?echo $datefrFin;?> <br/>

 En foi de quoi nous signons cette attestation muni du cachet de l'Ecole, pour faire valoir ce que de droit.<br/>
 
                                                                 Délivré à Bujumbura , le  <?   echo "<b>". date('d /m /Y')."</b>";
?><br/>
 
</font>

 
<table width=100%>
<tr><td><BR/>Directeur Adjoint Chargé de la FC</td><td align="right">Directeur de l'ENA<br/></td></tr>

<tr><td>


<? $sql2 ="SELECT * from employe where (fonction = 'Directeur Ajoint') and (statut = 'Actif')";
$resultat = mysql_query($sql2);
while($data=mysql_fetch_array($resultat)){
										echo $data['Nom_employe'].' '.$data['Prenom_employe'];	
}

?>






</td><td align="right">
<? $sql2 ="SELECT * from employe where (fonction = 'Directeur') and (statut = 'Actif')";
$resultat = mysql_query($sql2);
while($data=mysql_fetch_array($resultat)){
										echo $data['Nom_employe'].' '.$data['Prenom_employe'];	
}

?>


</td>
</tr>


</table>
</td></tr>
<tr><td><img src="images/right.jpg"  width=100% height=10></td> </tr>

</table>

<?} else {
	
	?>
	<input type="button" value="Imprimer" onclick="window.print()">
	<tr><td rowspan=3><img src="images/right.jpg" width=100% height=580></td><td><img src="images/right.jpg" width=100% height=10></td><td rowspan=3><img src="images/right.jpg" width=100% height=580></td></tr>
	<tr><td>
<div align ="center"><h1><font color="green"><B>REPUBLIQUE DU BURUNDI</B></font></h1> <br/>
<img src="images/logo.gif" width=200 height=100><br/>
<h1><font color="black"><B>ATTESTATION</B></font></h1> <br/>
<font color="black"><B>L'Ecole Nationale d'Administration atteste que</B></font> <br/>




</div>

<BR/><BR/>
 <font size="5">Mr,Mme,Mlle <?echo"<b>". $ligne['Nom']." ".$ligne['Prenom']."</b>";?> a participé à la formation sur <? echo $ligne['Nom_cours'];?> d'un volume de <? echo $ligne['dure'];?>H qui a lieu à Bujumbura du <?echo $ligne['DateDebut'];?> au  <?echo $ligne['DateFin'];?> <br/>

 En foi de quoi nous signons cette attestation muni du cachet de l'Ecole, pour faire valoir ce que de droit.<br/>
 
                                                                 Délivré à Bujumbura , le  <?   echo "<b>". date('d /m /Y')."</b>";
?><br/>
 
</font>

 
<table width=100%>
<tr><td><BR>Directeur Adjoint Chargé de la FC</td><td align="right">Directeur de l'ENA<br/></td></tr>

<tr><td>


<? $sql2 ="SELECT * from employe where (fonction = 'Directeur Ajoint') and (statut = 'Actif')";
$resultat = mysql_query($sql2);
while($data=mysql_fetch_array($resultat)){
										echo $data['Nom_employe'].' '.$data['Prenom_employe'];	
}

?>






</td><td align="right">
<? $sql2 ="SELECT * from employe where (fonction = 'Directeur') and (statut = 'Actif')";
$resultat = mysql_query($sql2);
while($data=mysql_fetch_array($resultat)){
										echo $data['Nom_employe'].' '.$data['Prenom_employe'];	
}

?>


</td>
</tr>


</table>
</td></tr>
<tr><td><img src="images/right.jpg"  width=100% height=10></td> </tr>

</table>


<?}}?>
</body>
</html>