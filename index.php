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
                       
                    </li>
					<li><a href="#">Générer Documents<!--[if IE 7]><!--></a><!--<![endif]-->
                    <!--[if lte IE 6]><table><tr><td><![endif]-->
                        <ul>
                        <li><a href="certificat.php" title="">Générer Certificat</a></li>
                        <li><a href="attestation.php" title="">Générer Attestation</a></li>
                        <li><a href="rapport.php" title="">Générer Rapport</a></li>
                        
                        </li>
                    
                        </ul>
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
                        <li><a href="certificat.php" title="">Voir Notes</a></li>
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
      <h1>Gestion de la Formation continue</h1>
			<p>
					Bienvenue Cher Utilisateur !<br />
					Vous êtes sur l'application de Gestion de la Formation Continue.<br />
				   Cette application est une application qui a été conçue pour faciliter vos tâches  dans le service de la FC et la rapidité dans vos travaux quotidiens.<br />
				
				Merci et Bonne Compréhension.
			</p>
     
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