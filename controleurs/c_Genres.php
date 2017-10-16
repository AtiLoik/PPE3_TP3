<?php //Le contrôleur secondaire gére plusieurs cas ou actions
$action = $_REQUEST['action']; 
switch($action) 
{ 
	case 'all': 	 $lesGenres=Genre::getAll(); // récupére les liste de tous les artistes
					 include("vues/v_genres.php"); // on appelle la vue artiste pour les afficher
					 break;
					 
	case 'modifier' : // on appelle la même vue dans le cas d'un ajout ou d'une modification
					// la distinction se fera sur le paramètre de l'id de l'artiste (si c'est un ajout il n'y
					// a pas d'id puisqu'il est auto incrémenté et qu'il n'est donc pas connu avant l'ajout !
					include("vues/v_formGenres.php");
					break;
					
	case 'ajouter' :
					include("vues/v_formGenres.php");
					break;
					
	case 'VerifForm' :	
					if(!empty($_POST['idGenre'])) // s'il s'agit d'une modification
					{
						// a compléter Artist::modifierArtiste($_POST['idArtiste'],$_POST['nomArtiste']);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					else // s'il s'agit d'un ajout
					{
						// a compléter Artist::ajouterArtiste($_POST['nomArtiste']);
						header("refresh: 0;url=index.php?uc=Genres&action=all");
					}
					break;
					
	case 'supprimer' :
					Genre::supprimerGenre($_REQUEST['numgenre']);
					header("refresh: 0;url=index.php?uc=Genres&action=all");
					//refresh: 0;
					break;
	default: echo "rien";
} 
?>