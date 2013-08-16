<?php
	session_start();
		include("includes/connect.php");//connection au serveur et sélection de la base de données:
		
		connect();
		
		$id=$_GET["id"] ;//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  
		$sql="SELECT * FROM participant where idParticipant = ".$id;
		//echo $sql;exit;
		$query = mysql_query($sql);//requête SQL:
		
		
		if(mysql_num_rows($query) == 0)
			{
			$message=" aucun enregistrement";
			}
			
		while($array=mysql_fetch_array($query)){
				$cni=$array['CNI'];
				$nom=$array['Nom'];
				$prenom=$array['Prenom'];
				$genre=$array['Genre'];
				$origine=$array['Origine'];
				$mobile=$array['TelMob'];
				$code=$array['code'];
				$date=$array['DateInscription'];
		}
		$message="";
		if(array_key_exists('submit',$_POST)){		
			foreach($_POST as $key=>$value){
				${$key}=mysql_real_escape_string(strip_tags(trim($value)));
			}
			/*echo"<pre>";
			print_r($_POST);
			echo"</pre>",exit; */
			if(empty($cni1) OR empty($nom1) OR empty($prenom1) OR empty($genre1) OR empty($origine1) OR empty($mobile1) OR empty($code1) OR empty($date1)){
								$message.="Tous les champs vides doivent etre remplis! \n";
								
			}
			elseif(!empty($cni1) OR !empty($nom1) OR !empty($prenom1) OR !empty($genre1) OR !empty($origine1) OR !empty($mobile1) OR !empty($code1) OR !empty($date1)){	
					
					if($cni == $cni1 && $nom == $nom1 && $prenom == $prenom1 && $genre==$genre1 && $mobile == $mobile1 && $code == $code1 && $origine == $origine1 && $date==$date1){
						$message.="Aucune modifiaction n'a été effectuée!";
					}
					else{
								$requete="UPDATE participant SET  CNI='$cni1',Nom='$nom1',Prenom='$prenom1',Genre='$genre1',Origine='$origine1',TelMob='$mobile',code='$code1',DateInscription='$date1' WHERE idParticipant='$id'";
									
								$execute=mysql_query($requete);
								if($execute){
										$mess.="Félicitations. La modification a réussi:";
										
								}else{
								$messag.="Echec d'enregistrement. Veuillez réessayer !";
							}
							}			
					

}
}		
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
                     
                    <li><a href="Presence.php">Générer Documents<!--[if IE 7]><!--></a><!--<![endif]-->
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
                    <li><a href="">Notes</a>
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
    
    		<div class="sidebar_search">
            <form>
            <input type="text" name="" class="search_input" value="search keyword" onclick="this.value=''" />
            <input type="image" class="search_submit" src="images/search.png" />
            </form>            
            </div>
    
                     
            
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
        <div class="warning_box">
        <?php
										if(!empty($message)){
											echo "<span style='color:red; font-size:10pt;'>$message</span>";
										}
									?>

     </div>
     <div class="valid_box">
       <?php
										if(!empty($mess)){
											echo "<span style='color:red; font-size:10pt;'>$mess</span>";
										}
									?>

     </div>
     <div class="error_box">
	 
<?php
										if(!empty($messag)){
											echo "<span style='color:red; font-size:10pt;'>$messag</span>";
										}
										
										
									
?>
     </div> 
       
           
     <h2>Formulaire de Demande de Formation</h2>
     
         <div class="form">
         <form method="post" action="" class="niceform">
						<fieldset>
							
									
								<table id="demand">
									<dl>
											<dt>
											<label>CNI : </label>
										</dt>
										<dd>
											<input type="text" name="cni1" size="54" class="alpha" maxlength="256" value="<?php echo $cni;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>
											<label>Nom : </label>
										</dt>
										<dd>
											<input type="text" name="nom1" class="alpha" size="54" maxlength="256" value=" <?php echo $nom;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Prénom :</label>
										</dt>

										<dd>
											<input type="text" name="prenom1" class="numeric" size="54" maxlength="256" value=" <?php echo $prenom;?>" required/>
										</dd>
									</dl>
										<dl>
										<dt>	
											<label> Genre:</label>
										</dt>
										<dd>
											<input type="text" name="genre1" class="numeric" size="54" maxlength="256" value=" <?php echo $genre;?>" required/>
										</dd>
									</dl>
										<dl>
										<dt>	
											<label>Origine :</label>
										</dt>

										<dd>
											<input type="text" name="origine1" class="alpha" size="54" maxlength="256" value=" <?php echo $origine;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Téléphone :</label>
										</dt>

										<dd>
											<input type="text" name="mobile1" size="54" maxlength="256" value=" <?php echo $mobile;?>" required/>
										</dd>
									</dl>
									<dl>
										<dt>	
											<label>Code Formation :</label>
										</dt>

										<dd>
											<input type="text" name="code1" class="numeric" size="54" maxlength="256" value=" <?php echo $code;?>" required/>
										</dd>
									</dl>

									
									<dl>
										<dt>	
											<label>Date d'Inscription :</label>
										</dt>

										<dd>
											<input type="date" name="date1" class="numeric" size="54" maxlength="256" value=" <?php echo $date;?>" required/>
										</dd>
									</dl>
										<tr>

										<td>
											<input type="submit"  name="submit" value="Modifier"/>
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