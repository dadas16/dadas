<?php
		include("includes/connect.php");//connection au serveur et sélection de la base de données:
		connect();
		//$id=$_GET["id"] ;//récupération de la variable d'URL,
		$id=$_POST["idToDelete"] ;//récupération de la variable d'URL,
		//echo "$id";exit;
		//qui va nous permettre de savoir quel enregistrement supprimer
  
		$query = "DELETE FROM module WHERE id_Module = ".$id ;
  	    //echo "$query";exit;
			//exécution de la requête:
			$requete = mysql_query($query) ;
			//$execute=mysql_query($requete);
			$message="";
 
			//affichage des résultats, pour savoir si la suppression a marchée:
			if($requete)
			{
				$message.="Félicitations. La Suppression a réussi:";
				//echo $message;
				echo $id;
				//header('Location:Formation.php');
			}
			else
			{
				$message.="La suppression a échouée:";
				echo $message;
			}
	//;
  ?>	