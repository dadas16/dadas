<?php
	session_start();
		include("includes/connect.php");//connection au serveur et sélection de la base de données:
		
		connect();
		
		$id=$_GET["id"] ;//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
		
		$sql="SELECT * FROM module where id_Module = ".$id;
		//echo $sql;exit;
		$query = mysql_query($sql);//requête SQL:
		//echo $query;exit;
		
		if(mysql_num_rows($query) == 0)
			{
			$message=" aucun enregistrement";
			}
			
		while($array=mysql_fetch_array($query)){
				$categorie=$array['categorie'];
				$nom=$array['nom'];
				$code=$array['code'];
				$dure=$array['dure'];
				
		}

		$message="";
		$success="";
		if(array_key_exists('submit',$_POST)){		
			foreach($_POST as $key=>$value){
				${$key}=mysql_real_escape_string(strip_tags(trim($value)));
			}
			/*echo"<pre>";
			print_r($_POST);
			echo"</pre>",exit;*/
			if(empty($categorie1) OR empty($nom1) OR empty($code1) OR empty($dure1) ){
								$message.="Le catégorie, nom, code, durée sont des données obligatoires! \n";
								
			}
			elseif(!empty($categorie1) && !empty($nom1) &&  !empty($code1) && !empty($dure1)){	
					
					if($categorie == $categorie1 && $nom == $nom1 && $code == $code1 && $dure==$dure1){
						$message.="Aucune modifiaction n'a été effectuée!";
					}
					else{
								$requete="UPDATE module SET  categorie='$categorie1',nom='$nom1',code='$code1',dure='$dure1' WHERE id_Module='$id'";
									
								$execute=mysql_query($requete);
								if($execute){
										$success.="Félicitations. La modification a réussi:";
										header('Location:formation.php');
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

	<link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<!--<link href="css/grey.css" rel="stylesheet" type="text/css" />-->
	<link href="pagination/css/B_blue.css" rel="stylesheet" type="text/css" />

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
                    <li><a href="module.php">Nouvelle Formation<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                    <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                    </li>
                    <li><a href="formation.php">Liste des Formations<!--[if IE 7]><!--></a><!--<![endif]-->
                    </li>
                   
					<li><a href="#">Voir Statistiques<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="certificat.php" title="">Formations</a></li>
						<li><a class="sub1" href="#" title="">Genre<!--[if IE 7]><!--></a><!--<![endif]-->
                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                            <ul>
                                <li><a href="homme.php" title="">Hommes</a></li>
                                <li><a href="femme.php" title="">Femmes</a></li>
                              </ul>
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
        <?php echo $message;?>
     </div>
     <div class="valid_box">
       <?php echo $success;?>
     </div>
     <div class="error_box">
       
     </div> 
	 <h2>Formulaire de modification du catalogue  de Formation</h2>

		<div class="form">
		
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="categorie1">Catégorie:</label></dt>
                        <dd><input type="text" name="categorie1" size="54" id="categorie1" maxlength="256" value="<?php echo $categorie;?>"/>
</dd>
                    </dl>
                    <dl>
                        <dt><label for="nom1">Module:</label></dt>
                        <dd><input type="text" name=" nom1" size="54" id="nom1" maxlength="256" value="<?php echo $nom;?>"/></dd>
                    </dl>
                     <dl>
                        <dt><label for="code1">Code:</label></dt>
                        <dd><input type="text" name="code1" size="54" maxlength="256" value="<?php echo $code;?>"/></dd>
                    </dl>
                    <dl>
                        <dt><label for="genre">Durée:</label></dt>
                        <dd><input type="text" name="dure1" size="54" maxlength="256" value="<?php echo $dure;?>"/></dd>
                    </dl>
                    <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Modifier" />
                     </dl>
					 
                     
                    
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