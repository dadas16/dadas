<?php
	session_start();
	if($_SESSION['usertype']!='responsable'){
		header("location:login.php");
	}

	include("includes/connect.php");  
	connect();
	$today = date('Y-m-d');
	// crée les listes des modules
 $listenoms = "";
 $sql = "SELECT * FROM module ORDER BY nom;";
 $result = mysql_query($sql) or die(mysql_error());
 while($result && $row=mysql_fetch_array($result))
 {
         $selected = $row['nom']==$nom? " selected " : "";
         $listenoms .= "<option value=\"".$row['nom']."\" ".$selected." >".$row['nom']."</option>";
 }
	
	$message="";
	$messag="";
	$mess="";
	
	if (array_key_exists ("submit",$_POST)){ 	
		foreach($_POST as $key=>$value){
					${$key}=mysql_real_escape_string(strip_tags(trim($value)));
		}
		//echo $dateprob;exit; 

		
			if(empty($_POST['demandeur']) OR empty($_POST['module']) OR empty($_POST['effectif']) OR empty($_POST['dure']) OR empty($_POST['benefit']) OR empty($_POST['dateprob']) OR empty($_POST['contact'])){
			
						$message.= "Attention! Un ou plusieurs Champs du formulaire sont Vide. Veuillez le(s) Remplir!";
			} elseif(!empty($_POST['demandeur']) and !empty($_POST['module']) and !empty($_POST['effectif']) and !empty($_POST['dure']) and !empty($_POST['benefit']) and !empty($_POST['dateprob']) and !empty($_POST['contact']) and !empty($_POST['statut'])){
			
			
			if(!(preg_match('#[a-zA-Z]#',$_POST['demandeur']))) 
					{
					
					$message.= "vous avez saisi un nombre pour demandeur!<br/>";
					}
			if(!(preg_match('#[a-zA-Z]#',$_POST['module']))) 
					{
					
					$message.= "vous avez saisi un nombre pour module demandé!<br/>";
					}			
			if(!(preg_match('#[0-9]#',$_POST['effectif']))) 
					{
					
					$message.= "vous avez saisi un caractère pour l effectif!<br/>";
					}
			if(!(preg_match('#[0-9]#',$_POST['dure'])) )
					{
					
					$message.= "vous avez saisi un caractère pour la durée!<br/>";
					}

			
			if(!(preg_match('#[a-zA-Z]#',$_POST['benefit']))) 
					{
					
					$message.= "vous avez saisi un nombre pour le beneficiaire!<br/>";
					}
					
				//CHECK DATE 
					if ($dateprob < $today)
					{ 
						$message.=" La date ne peut pas être antérieure à celle d'aujourd'hui";
					}		
			
						if($message=="")
						{
			

						
							$insert=mysql_query("INSERT INTO demande VALUES ('null','$demandeur','$module','$effectif','$dure','$benefit','$dateprob','$contact','$statut')") or die(mysql_error());
							}
							if($insert){
									$mess.="Félicitations! Enregistrement Réussi";
									unset($_POST);
									header("list.php");
							}else{
								$messag.="Echec d'enregistrement. Veuillez réessayer !";
							}
				}		
			}
	
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
<script type="text/javascript" src="alphanumeric.js"></script>
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
                    <li><a href="note.php">Notes</a>
					<ul>
                        <li><a href="inscrire.php" title="">Inscrire Notes</a></li>
                        <li><a href="voirnotes.php" title="">Voir Notes</a></li>
                        </ul>
                        </li>
                    <li><a href="">Contact</a></li>
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
         <div >
        <?php
										if(!empty($message)){
											echo "<span style='color:red; font-size:10pt;'>$message</span>";
										}
									?>

     </div>
     <div >
       <?php
										if(!empty($mess)){
											echo "<span style='color:green; font-size:10pt;'>$mess</span>";
										}
									?>

     </div>
     <div >
	 
       <?php
										if(!empty($messag)){
											echo "<span style='color:red; font-size:10pt;'>$messag</span>";
										}
										
										
									$demandeur=(isset($_POST['demandeur'])?$_POST['demandeur']:'');
									$module=(isset($_POST['module'])?$_POST['module']:'');	
									$effectif=(isset($_POST['effectif'])?$_POST['effectif']:'');
									$dure=(isset($_POST['dure'])?$_POST['dure']:'');
									$benefit=(isset($_POST['benefit'])?$_POST['benefit']:'');
									$dateprob=(isset($_POST['dateprob'])?$_POST['dateprob']:'');
									$contact=(isset($_POST['contact'])?$_POST['contact']:'');
									$statut=(isset($_POST['statut'])?$_POST['statut']:'');	
										
									?>
     </div> 
       
           
     <h2>Formulaire de Demande de Formation</h2>
     
         <div class="form">
         <form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									<dl>
											<dt>
											<label>Demandeur d'action : </label>
										</dt>
										<dd>
											<input type="text" name="demandeur" size="54" class="alpha" maxlength="256" value="<?php echo $demandeur;?>" required/>
										</dd>
									</dl>
										<dl>
										<dt>	
											<label>Module Demandé :</label>
										</dt>

										<dd>
											<select name="module" value="<?php echo $nom; ?>" size="1" >
 <option value=" " ></option>
 <?php echo $listenoms; ?>
 </select>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Effectif :</label>
										</dt>

										<dd>
											<input type="text" name="effectif" class="numeric" size="54" maxlength="256" value=" <?php echo $effectif;?>" required/>
										</dd>
									</dl>
										<dl>
										<dt>	
											<label> Durée(Heures):</label>
										</dt>
										<dd>
											<input type="text" name="dure" class="numeric" size="54" maxlength="256" value=" <?php echo $dure;?>" required/>
										</dd>
									</dl>
										<dl>
										<dt>	
											<label>Bénéficiaires :</label>
										</dt>

										<dd>
											<input type="text" name="benefit" class="alpha" size="54" maxlength="256" value=" <?php echo $benefit;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Date Probable :</label>
										</dt>

										<dd>
											<input type="date" name="dateprob" size="54" maxlength="256" value=" <?php echo $dateprob;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Contact Client :</label>
										</dt>

										<dd>
											<input type="text" name="contact" class="numeric" size="54" maxlength="256" value=" <?php echo $contact;?>" required/>
										</dd>
									</dl>

									
									<dl>
										<dt>	
											<label>Statut :</label>
										</dt>
										<dd> <select name="statut" size="1" maxlength="256" value="<?php echo $statut;?>"required >
												<option>
												<option>A traiter
												<option> Acceptée
												<option> Refusée
												</select>
										</dd>
										</dl>
										<tr>

										<td>
											<input type="submit"  name="submit" value="Sauvegarder"/>
										</td>
										<td>
											<input type="reset"  name="reset" value="annuler"/>
										</td>
									</tr>
								</table>
							</fieldset>
						</form>
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