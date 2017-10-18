<?php
class Genre extends Entity{
	
	/**
     * Retourner tous les artistes de la base
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function getAll()
    {
        $sql="SELECT * FROM genre " ;
        $resultat=MonPdo::getInstance()->query($sql);
        $lesGenres=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Genre');
        return $lesGenres;
		throw new Exception("Problème dans l'execution de la requête.") ;
    }
	
	/**
     * ajoute un artiste dans la base
	 * @param string<nom> nom de l'artiste
     * @return array<Artist> tableau d'instances de Artist
    */
    public static function ajouterGenre($nom)
    {
		$sql="insert into genre(nom) values(:nom )" ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':nom', $nom);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	
	//supprime un artiste dont on passe l'id en paramètre
    public static function supprimerGenre($id)
    {
		// a completer 
        $sql="delete from genre where id= :id " ;
        $resultat=MonPdo::getInstance()->prepare($sql);
        $resultat->bindParam(':id', $id);
        $resultat->execute();
		// ajouter la gestion des exceptions
    }
	// trouve un artiste grace à son id passé en paramètre
	// renvoie un objet Artiste
    public static function findById($id)
    {
        $sql="SELECT * FROM genre where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($id)); // applique le paramètre
        $leGenre=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Genre"); // lit la ligne et renvoie un objet Artist
        return $leArtist[0];
		// ajouter la gestion des exceptions
    }
	
	// modifie un objet Artiste
    public static function modifierGenre($id,$nom)
    {
		// a completer 
        $sql="update genre set nom= ? where id= ?" ;
        $resultat=MonPdo::getInstance()->prepare($sql); // prépare la requête
        $resultat->execute(array($nom,$id)); // applique le paramètre
    }
	
	/**
     * renvoie la liste des albums d'un artiste
     * @return array<Album> tableau d'instances de Album
    */
    public function getAlbums()
    {
        $sql="SELECT * FROM album where genre= ". $this->getId();
        $resultat=MonPdo::getInstance()->query($sql);
        $lesAlbums=$resultat->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Album');
        return $lesAlbums;
    }
}