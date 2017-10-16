<div id="page">
	<div id="content">
		<div class="box">
			<h2>Liste des albums</h2>
			<section>
			<?php		
			If (!empty( $_SESSION['connexion'])) // si quelqu'un est connecté
			{ ?>
				<a class="btn" href='index.php?uc=Album&action=ajouter'>Ajouter un album</a>

			<?php } ?>

			<table><tr><th>Numéro</th><th>Titre</th><th>Année</th><th>Genre</th><th>actions</th></tr>
			<script>

			function supprAlbum(id) {
				if(confirm("Voulez vous vraiment supprimer cet Album ?"))
				{
					location.href='index.php?uc=Album&action=supprimer';
					//&numalb='+id
				}
				else {
					alert("l'album n'a pas été supprimé.");
				}
			}

			</script>

			<?php 
				foreach($lesAlbums as $Album) //parcours du tableau d'objets récupérés
				{ 	
				$idAlb=$Album->getId();           
				$titre=$Album ->getNom();
				$annee=$Album ->getAnnee();
				$genre=$Album ->getGenre();
			?>
				<tr>
					<td width=5%><?php echo $idAlb?></td><td width=80%><?php echo $titre?></td><td><?php echo $annee?></td><td><?php echo $genre?></td><!--affichage dans des liens-->
					<td class='action' width=15%>
		<?php		
				//If (!empty( $_SESSION['connexion']))  si quelqu'un est connecté
				//{ 
		?>	
					<a href='index.php?uc=Album&action=modifier&numalb=<?php echo $idAlb ?>' class="imageModifier" title="modifier l'album"></a>
					<span class="imageSupprimer" onclick="javascript:supprAlbum('<?php echo $idAlb ;?>')" title="Supprimer l'album" ></span> <!-- on met un span pour pouvoir invoquer le on click -->
						<!-- à compléter pour voir un albums (nom et morceaux)
						pour supprimer un album et pour modifier un album -->
					</td>
				</tr>
			<?php
				}
			?>
			</table>
		</div>
	</div>
	<br class="clearfix" />
</div>


