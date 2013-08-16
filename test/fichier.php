<?php
// si on reçoit une donnée
if(isset($_GET['q'])) {
    $q = htmlentities($_GET['q']); // protection
     //echo $q;exit;
    // connexion à la base de données
    
	$connection = mysql_connect('localhost', 'root', '');	
	$db = mysql_select_db('userdata', $connection);

	/*try {
        $bdd = new PDO('mysql:host=localhost;dbName=userdata', 'root', '');
    } catch(Exception $e) {
        exit('Impossible de se connecter à la base de données.');
    }*/
	
    // écriture de la requête
    $requete = "SELECT Name	FROM userdetail WHERE Name LIKE '". $q ."%' LIMIT 0, 10";
    //echo $requete;exit;
	
	// exécution de la requête
    $resultat = mysql_query($requete);
    // affichage des résultats
    while($donnees = mysql_fetch_assoc($resultat)) {
        //echo"<pre>";print_r($donnees);echo"</pre>";exit;
		echo $donnees['Name'] ."\n";
    }
}
?>