<div id="page">
	<div id="content">
		<div class="box">
			<h2>Liste des genres</h2>
			<section>
			<?php		
			If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
			{ ?>
				<a class="btn" href='index.php?uc=Genres&action=ajouter'>Ajouter un Genres</a>

			<?php } ?>
			
			<table><tr><th>Numéro</th><th>Nom</th><th>actions</th></tr>
			<script>

			function supprGenre(id) {
				if(confirm("Voulez vous vraiment supprimer cet album ?"))
				{
					location.href='index.php?uc=Genres&action=supprimer&numgenre='+id;
				}
				else {
					alert("le genre n'a pas été supprimé.");
				}
			}

			</script>

		<?php
			foreach($lesGenres as $Genres) //parcours du tableau d'objets récupérés
			{ 	$idGen=$Genres->getId();           
				$nom=$Genres ->getNom();
		?>

			<tr>
			<td width=5%><?php echo $idGen?></td><td width=80%><?php echo $nom?></a></td><!--affichage dans des liens-->
			<td class='action' width=15%>
				<a href='index.php?uc=Albums&action=genre&numgenre=<?php echo $idArt ?>' class="imageRechercher" title='Voir la liste des albums'></a>
		<?php		
				//If (!empty( $_SESSION['connexion']))  si quelqu'un est connecté
				//{ 
		?>	
					<a href='index.php?uc=Genres&action=modifier&numgenre=<?php echo $idArt ?>' class="imageModifier" title="modifier le genre"></a>
					<span class="imageSupprimer" onclick="javascript:supprGenre('<?php echo $idGen ;?>')" title="supprimer le genre" ></span> <!-- on met un span pour pouvoir invoquer le on click -->
		<?php // } 
		?>
			</td>

			</tr>
			<?php
			}
			?>
			</table>
			</section>
		</div>
	</div>
	<br class="clearfix" />
</div>

