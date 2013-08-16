<?php
	@session_start();
	include('includes/connect.php');
	connect();
	$sql_quartier="SELECT * FROM Quartier";
	$query=mysql_query($sql_quartier);
	$message="";
	
?>
<form action="result_search.php" method="post">
	<table>
		<tr>
			<td>	
				<label for="nom"><span>Nom <sup>*</sup> </span></label>
						<input type='text' name="nom" value=""/>
			</td>	
			<td>
				<label for="quartier"><span>Quartier :</span></label>
				<select name="quartier">
					<?php
						while($row=mysql_fetch_row($query)){
							/*print_r($row);exit;*/
							echo"<option value=$row[2]>$row[2]</option>";
						}
					?>
				</select>
			</td>
			<td>	
				<input type="submit" name="submit" value="Rechercher" />	
			</td>		
		</tr>
		</table>
		</form>
<?php 
		/*if(@$requete){
			if(mysql_num_rows($requete) > 0){
				echo"	<table><th>Numero Cni</th><th>Nom</th>
					<th>Prenom</th><th>Tel.Mobile</th><th>Residence</th><th>Extras</th>";
				
				while($donne=mysql_fetch_array($requete)){
						/*$cni=$donne['cni'];$nom=$donne['Nom'];$prenom=$donne['Prenom'];
						$mobile=$donne['TelMob'];$residence=$donne['QRes'];
	
					echo "<tr><td>".$donne['CNI']."</td><td>".$donne['Nom']."</td><td>".$donne['Prenom']."</td><td>".$donne['TelMob']."</td>  
									<td>".$donne['QRes']."</td><td><a href='parcelform.php?id=".$donne['idContribuable']."'>Parcelle</a></td></tr>";
				}
					echo "</table>";
			}	
		}
		else{
				$message.="Désolé, aucun enregistrement ne correspond aux criteres fournis. Veuillez réessayer.";
		}
				
		/*if(!empty($message)){
						echo "<span>$message</span>";
		}*/
?>

