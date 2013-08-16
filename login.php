<?php
	ob_start();
	session_start();
	//echo"<pre>";print_r($_SESSION);echo"</pre>";exit;
	include("includes/connect.php");  
	connect();
	if (array_key_exists ("submit",$_POST))
	{		
		$error= "";
		if(empty($_POST['pseudo']) or empty($_POST['password']))
		{
			$error.= "Veuillez entrer le pseudo et/ou le mot de passe";
						/*echo $_POST['pseudo']."<br />".$_POST['password']; exit;*/
		}
		else 
		{	
			foreach($_POST as $key => $value)
			{
				${$key}=mysql_real_escape_string(strip_tags(trim($value)));
					
			}
			/*$pseudo=mysql_real_escape_string(strip_tags(trim($_POST['pseudo'])));
			$password=mysql_real_escape_string(strip_tags(trim($_POST['password'])));*/
			$pass_crypt=md5($password);
			$select=mysql_query("select * from utilisateur where Pseudo ='$pseudo' and Mot_de_Passe='$pass_crypt'") or die(mysql_error());
					
					
			if($select)
			{
				if(mysql_num_rows($select)==0)
				{
					$error.="aucun enregistrement ne correspond aux paramètres fournis!";
				}
				if(mysql_num_rows($select)>1)
				{
					$error.="Plusieurs enregistrement remplissent les critères fournis!";
				}
						
				if(mysql_num_rows($select)==1)
				{
						$row=mysql_fetch_array($select);
						//echo"<pre>";print_r($row);echo"</pre>";exit;
						if($pseudo == $row['Pseudo'] && $pass_crypt==$row['Mot_de_Passe'])
						{
								//session_start();
								$_SESSION['pseudo']=$row['pseudo'];								
								$_SESSION['idRespo']=$row['idRespo'];
								$_SESSION['pass_crypt']=$row['Mot_de_Passe'];
								$_SESSION['usertype']=$row['typeutilisateur'];
								/*print_r($_POST); exit;*/
								if($_SESSION['usertype']=='responsable'){
									header('location:index.php');
						}
									else{
											header('location:admin/index.php');
									}
								
									
						}
						
					}
			}
			ob_end_flush();
	}  
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-Type" content="text/html;charset=iso-8859-1"/>
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

<script type="text/javascript" src="jconfirmaction.jquery.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		$('.ask').jConfirmAction();
	});
	
</script>

<script language="javascript" type="text/javascript" src="niceforms.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="niceforms-default.css" />

</head>
<body>
<div id="main_container">

	<div class="header_login">
    <div class="logo"><a href="#"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>
    
    </div>

     
         <div class="login_form">
         
         <h3> Login</h3>
         
        <!-- <a href="#" class="forgot_pass"></a> -->
         
         <form action="" method="post" class="niceform">
         
                <fieldset>
                    <dl>
                        <dt><label for="email">Username:</label></dt>
                        <dd><input type="text" name="pseudo" id="" size="54" /></dd>
                    </dl>
                    <dl>
                        <dt><label for="password">Password:</label></dt>
                        <dd><input type="password" name="password" id="" size="54" /></dd>
                    </dl>
                    <?php if(isset($error) and !empty($error)){echo $error;}?>
                    <!--<dl>
                        <dt><label></label></dt>
                        <dd>
                    <input type="checkbox" name="interests[]" id="" value="" /><label class="check_label">Remember me</label>
                        </dd>
                    </dl>-->
                    
                     <dl class="submit">
                    <input type="submit" name="submit" id="submit" value="Enter" />
                     </dl>
                    
                </fieldset>
                
         </form>
         </div>  
          
	
    
    <div class="footer_login">
	<?php
	$time=time();
	$currentYear=date ('Y',$time);
?>
	<div class="left_footer_login">&copy;copyright  "Audace and  Jean-Marie" 2012 - <?php echo $currentYear;?>, tous droits réservés </a></div>
    	<div class="right_footer_login"><!--<a href="http://indeziner.com"><img src="images/indeziner_logo.gif" alt="" title="" border="0" /></a>--> </div>
    
    </div>

</div>		
</body>
</html>