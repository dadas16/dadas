<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENA</title>
<link rel="stylesheet" type="text/css" href="style.css" />

	<link href="../pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<!--<link href="css/grey.css" rel="stylesheet" type="text/css" />-->
	<link href="../pagination/css/B_blue.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "submenuheader", //Shared CSS class name of headers group
	contentclass: "submenu", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc] [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", ""], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["suffix", "<img src='images/plus.gif' class='statusicon' />", "<img src='images/minus.gif' class='statusicon' />"], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<script src="jquery.jclock-1.2.0.js.txt" type="text/javascript"></script>
<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>
<script type="text/javascript">
$(function($) {
    $('.jclock').jclock();
});
</script>

		
		
<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>

<body>
<?php
include('includes/connect.php');
connect();
if (isset($_POST["recherche"]))
{
$rech=$_POST["search"];
$sql2=mysql_query("SELECT * FROM demande where demandeur like '".$rech."' or module like '".$rech."' or effectif like '".$rech."' or dure like '".$rech."' or benefit like '".$rech."' or dateprob like '".$rech."' or statut like '".$rech."' ") or die (mysql_error());

echo" 
							
<table id=\"rounded-corner\" summary=\"2007 Major IT Companies' Profit\">
 							
   <thead>
    	<tr>
        	<th scope=\"col\" class=\"rounded-company\"></th>
            <th scope=\"col\" class=\"rounded\">Demandeur D'Action</th>
            <th scope=\"col\" class=\"rounded\">Module Demand�</th>
            <th scope=\"col\" class=\"rounded\">Dur�e</th>
			<th scope=\"col\" class=\"rounded\">Effectif</th>
            <th scope=\"col\" class=\"rounded\">B�n�ficiaires</th>
            <th scope=\"col\" class=\"rounded\">Date Probable</th>
            <th scope=\"col\" class=\"rounded\">Contact Client</th>
			<th scope=\"col\" class=\"rounded-q4\" colspan=\"3\" align=\"center\">Extras</th>
        
		</thead>";
   
while($data=mysql_fetch_array($sql2))
{
													$demandeur=$data['demandeur'];
													$module=ucfirst($data['module']);
													$effectif=ucfirst($data['effectif']);
													$dure=ucfirst($data['dure']);
													$benefit=ucfirst($data['benefit']);
													$dateprob=ucfirst($data['dateprob']);
													
												 
echo "
		

		<tbody>
		
 
    	<tr id=".$id.">
		
        	<td><input type=\"checkbox\" name=\"checkbox[]\" value=\"$id\" />
			</td><td>$demandeur</td>
			<td>$module</td>
			<td>$effectif</td>
			<td>$dure</td>
			<td>$benefit</td>
			<td>$dateprob</td>
			<td>$contact</td>
            <td><a href='traitement.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Traitement\" border=\"0\" /></a></td>
			<td><a href='statut.php?id=".$id."'><img src=\"images/user_edit.png\" alt=\"\" title=\"Voir Statut\" border=\"0\" /></a></td>
            
            <td id=".$id."><input type='hidden' class='supprimer' value=".$id." /><a href=\"#\" class=\"ask\"><img src=\"images/trash.png\" alt=\"\" title=\"Supprimer\" border=\"0\" /></a></td>
      
		</tr><br/>
		</tbody>
		";
				
		

		}
		echo"</tr></table>";
}


?>      

</body>
</html>