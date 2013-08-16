<?php 
session_start();
if(!isset($_SESSION['pseudo'])) header('location:login.php');
// init

 $date = isset($_GET['date']) && !empty($_GET['date'])? $_GET['date'] : null;
 $idSession = isset($_GET['code']) && !empty($_GET['code'])? $_GET['code'] : null;
 $nomModule = isset($_GET['nomModule']) && !empty($_GET['nomModule'])? $_GET['nomModule'] : null;
 $nomFormateur        = isset($_GET['nomFormateur']) && !empty($_GET['nomFormateur'])? $_GET['nomFormateur'] : null;
 
// variable pour savoir s'il faut créer une nouvelle absence ou modifier une existante
 $mode_ajout = isset($_GET['mode_ajout']) && !empty($_GET['mode_ajout'])? $_GET['mode_ajout'] : null;
 
// connction à la base de données
 mysql_select_db("fcontinue", @mysql_connect("localhost","root","")) or die(mysql_error());
 
// enregistrer la saisie du formulaire
 if (isset($_GET['action']) && $_GET['action']=='Enregistrer')
 {
         //
         $message = "";
         if (empty($date)) $message .= "<p>La date est obligatoire !</p>";
         if (empty($idSession)) $message .= "<p>La Session est obligatoire !</p>";
         if (empty($nomModule)) $message .= "<p>Le Module est obligatoire !</p>"; 
        if (empty($nomFormateur)) $message .= "<p>Le/la Formateur est obligatoire !</p>";
         //
         if (empty($message))
         {
                 $listeAbsences = isset($_GET['absences'])?$_GET['absences']:array();
                 //echo "<pre>"; print_r($listeAbsences); echo "</pre>";
                 $sql = "SELECT * FROM participant WHERE code = '".$idSession."';";
                 $result = mysql_query($sql) or die(mysql_error());
                 while($result && $row=mysql_fetch_array($result))
                 {
                         $idParticipant = $row['idParticipant'];     $nomParticipant = $row['nom'];
                         $presence_mat_t1 = isset($listeAbsences["$idParticipant"]['mat_t1'])?1:0;
                         $presence_mat_t2 = isset($listeAbsences["$idParticipant"]['mat_t2'])?1:0;
                         $presence_amidi_t1 = isset($listeAbsences["$idParticipant"]['amidi_t1'])?1:0;
                         $presence_amidi_t2 = isset($listeAbsences["$idParticipant"]['amidi_t2'])?1:0;
                         //
                         // Nouvel enregistrement ou Mise à jour
                         if ($mode_ajout==true){
                         $sql="INSERT INTO presence SET date='".$date."', idParticipant='".$idParticipant."', 
                                                                        nomModule='".$nomModule."', nomFormateur='".$nomFormateur."',
                                                                         presence_mat_t1='".$presence_mat_t1."',
                                                                         presence_mat_t2='".$presence_mat_t2."',
                                                                         presence_amidi_t1='".$presence_amidi_t1."',
                                                                         presence_amidi_t2='".$presence_amidi_t2."';";                           
                        } else {
                                 $sql="UPDATE presence SET      nomModule='".$nomModule."', nomFormateur='".$nomFormateur."',
                                                                         presence_mat_t1='".$presence_mat_t1."',
                                                                         presence_mat_t2='".$presence_mat_t2."',
                                                                         presence_amidi_t1='".$presence_amidi_t1."',
                                                                         presence_amidi_t2='".$presence_amidi_t2."'
                                                 WHERE date='".$date."' AND idParticipant='".$idParticipant."';";                    
                        }
                         //
                         //echo $sql;
                         if (!@mysql_query($sql)) $message .= "<li>".$nomParticipant." => Erreur : ".mysql_error()."</li>";
                 }
                 if (empty($message)) $message = "Enregistrement effectué avec succès"; 
                else $message = "<p>Les Erreurs suivantes sont rencontrées :</ul>" . $message . "</ul></p>";
         }
 }
 
// crée la liste des Sessions
 $listeSession = "";
 $sql = "SELECT DISTINCT code FROM participant ORDER BY code;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['code']==$idSession? " selected " : "";
         $listeSession .= "<option value=\"".$row['code']."\" ".$selected." >".$row['code']."</option>";
 }
 
// crée les listes des modules
 $listeModules = "";
 $sql = "SELECT * FROM module ORDER BY code;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['code']==$nomModule? " selected " : "";
         $listeModules .= "<option value=\"".$row['code']."\" ".$selected." >".$row['code']."</option>";
 }
 
// crée les listes des profs
 $listeFormateurs = "";
 $sql = "SELECT * FROM formateur ORDER BY nom;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['nom']==$nomFormateur? " selected " : "";
         $listeFormateurs .= "<option value=\"".$row['nom']."\" ".$selected." >".$row['nom']."</option>";
 }
 
// crée la liste des Participants de la classe sélectionnée
 $listePresenceParticipants = "";
 if (isset($idSession) && isset($date))
 {
         // on fait une jointure externe à gauche du côté de la table client vers la table assiduité
         // pour afficher tous les élèves de la classe même si les données de présence sont NULL (cas nouvelle saisie)
          $sql = "SELECT a.*, e.*
         FROM participant e LEFT OUTER JOIN presence a ON e.idParticipant=a.idParticipant AND a.date=date('".$date."')
         WHERE e.code = '".$idSession."'
         ORDER BY e.Nom, e.Prenom";
        
         //echo $sql;
         $result = mysql_query($sql) or die(mysql_error());
         while($result && $row=mysql_fetch_array($result))
         {               
                if($row['note']==0)
				{
				// si les données d'assiduité sont NULL (surtout la date) alors il s'agit d'une nouvelle feuille de présence
                 // sinon affiche l'absence sous 4 tranches horaires : 2 le matin(mat_t1 et mat_t2) et 2 l'après-midi(amidi_t1 et amidi_t2)
                 if (is_null($row["date"])) $mode_ajout = true; else $mode_ajout = false;
                 //
                 $mat_t1_checked = $row['presence_mat_t1']!=0 && !is_null($row['presence_mat_t1']) ? " checked " : "";
                 $mat_t2_checked = $row['presence_mat_t2']!=0 && !is_null($row['presence_mat_t2']) ? " checked " : "";
                 $amidi_t1_checked = $row['presence_amidi_t1']!=0 && !is_null($row['presence_amidi_t1']) ? " checked " : "";
                 $amidi_t2_checked = $row['presence_amidi_t2']!=0 && !is_null($row['presence_amidi_t2']) ? " checked " : "";
                 //
                 $listePresenceParticipants .= "<tr><td>".$row['Nom']." ".$row['Prenom']."</td>
                 <td><input type=\"checkbox\" name=\"absences[".$row['idParticipant']."][mat_t1]\" ".$mat_t1_checked." /> Absent(e)</td>
                 <td><input type=\"checkbox\" name=\"absences[".$row['idParticipant']."][mat_t2]\" ".$mat_t2_checked." /> Absent(e)</td>
                 <td><input type=\"checkbox\" name=\"absences[".$row['idParticipant']."][amidi_t1]\" ".$amidi_t1_checked." /> Absent(e)</td>
                 <td><input type=\"checkbox\" name=\"absences[".$row['idParticipant']."][amidi_t2]\" ".$amidi_t2_checked." /> Absent(e)</td>
                 </tr>";
				 }else{}
         }
		 
 }
 
// fin de connexion
 mysql_close();
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ENA</title>
<link rel="stylesheet" type="text/css" href="style.css" />
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
<div id="main_container">

	<div class="header">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    <div class="right_header">Welcome Admin  | <a href="login.php" class="logout">Logout</a></div>
    <div class="jclock"></div>
    </div>
    
    <div class="main_content">
    
                    <div class="menu">
                    <ul>
                    <li><a class="current" href="index.php">Accueil</a></li>
                    <li><a href="#">Demande<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="demande.php" title="">Inscrire Demande</a></li>
                        <li><a href="list.php" title="">Traiter Demande</a></li>
                        </ul>
                        </li>
                    
                    <li><a href="#">Participant<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="participant.php" title="">Inscrire Participant</a></li>
                        <li><a href="liste.php" title="">Liste des Participants</a></li>
                        </ul>
                        </li>
                     
                    <li><a href="#">Générer Documents<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="certificat.php" title="">Générer Certificat</a></li>
                        <li><a href="attestation.php" title="">Générer Attestation</a></li>
                        <li><a href="rapport.php" title="">Générer Rapport</a></li>
                        
                        </li>
                    
                        </ul>
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="#">Gérer présence</a>
					<ul>
                        <li><a href="presence.php" title="">Inscrire Présence</a></li>
						<li><a href="historique.php" title="">Historique des Présence</a></li>
                        <li><a href="voirpresence.php" title="">Vérification Présence</a></li>
                        </ul>
                        </li>
                    <li><a href="#">Notes</a>
					<ul>
                        <li><a href="inscrire.php" title="">Inscrire Notes</a></li>
                        <li><a href="voirnotes.php" title="">Voir Notes</a></li>
                        </ul>
                        </li>
                    <li><a href="stat.php">Contact</a></li>
                    </ul>
                    </div> 
                    
                    
                    
                    
                    
                    
                    
    <div class="center_content">  
    
    
    
    <div class="left_content">
    
    		   
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>User help desk</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h4>Important notice</h4>
                <img src="images/notice.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h5>Download photos</h5>
                <img src="images/photo.png" alt="" title="" class="sidebar_icon_right" />
                <p>
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>  
            
            <div class="sidebar_box">
                <div class="sidebar_box_top"></div>
                <div class="sidebar_box_content">
                <h3>To do List</h3>
                <img src="images/info.png" alt="" title="" class="sidebar_icon_right" />
                <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                 <li>Lorem ipsum dolor sit ametconsectetur <strong>adipisicing</strong> elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</li>
                  <li>Lorem ipsum dolor sit amet, consectetur <a href="#">adipisicing</a> elit.</li>
                   <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                     <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                </ul>                
                </div>
                <div class="sidebar_box_bottom"></div>
            </div>
              
    
    </div>  
    
    <div class="right_content">            
        <div class="form">
         <form action="" name="form1" method="get" class="niceform">
		 <fieldset>
		 <table>
 <tr>
 <th>Date  </th><td><input type="date" id="dateLib" name="date" value="<?php echo $date; ?>" style="width:140px"
         onfocus="visuCal(this,{'format' : '%a-%m-%j'})" onblur="masqueCal(this);"  /></td>
 
<th>Session </th><td><select name="code" onchange="form1.submit();" value="<?php echo $idSession; ?>" >
 <option value="" ></option>
 <?php echo $listeSession; ?>
 </select></td>
 
<th>Module  </th><td><select name="nomModule" value="<?php echo $nomModule; ?>" width="30px" >
 <option value="" ></option>
 <?php echo $listeModules; ?>
 </select></td>
 
<th>For  </th><td><select name="nomFormateur" value="<?php echo $nomFormateur; ?>" >
 <option value="" ></option>
 <?php echo $listeFormateurs; ?>
 </select></td>
 
</tr>
 </table>
 <hr />
		 </fieldset>
		 
		 
		 	<table id="rounded-corner" summary="2007 Major IT Companies' Profit">

 <tr><th>Nom - Prenom</th><th>8h00 - 10h00</th><th>10h00 - 12h00</th><th>13h30 - 15h30</th><th>15h30 - 17h30</th></tr>
 <?php echo $listePresenceParticipants; ?>
 </table>
 <input type="hidden" name="mode_ajout" value="<?php echo $mode_ajout; ?>" />
 <input type="submit" name="action" value="Enregistrer" />
 
 
 </form>
         </div>
<div class="valid_box">
        <?php echo isset($message)?$message:''; ?>
     </div>
	 
      
     
     
     </div><!-- end of right content-->
            
                    
  </div>   <!--end of center content -->               
                    
                    
    
    
    <div class="clear"></div>
    </div> <!--end of main content-->
	
    
    <div class="footer">
    
    	<?php
	$time=time();
	$currentYear=date ('Y',$time);
?>
    	<div class="left_footer">&copy;copyright  "Audace and  Jean-Marie" 2012 - <?php echo $currentYear;?>, tous droits réservés </div>
    	<!--<div class="right_footer"><a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a></div>-->
    </div>

</div>		
</body>
</html>