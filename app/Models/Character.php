<?php

require __DIR__.'/../utils/Database.php';

// Création de la Class Caracter
class Character {

    protected $name;
    protected $description;
    protected $picture;
    protected $type_Id;

    // Cette méthode permet de récupérer des données et de ranger par Ordre Alphabétique
    public function findCharacter()
    {
        $sql = 'SELECT `character`.name, `character`.description, `character`.picture, `type`.name as type_name
            FROM `character`
            INNER JOIN type
            ON type_id = type.id
            ORDER BY `name`';
        
        $pdo = Database::getPDO();

        $pdoStatement = $pdo->query($sql);
        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS);

        return $result;
    }
    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the value of type_Id
     */ 
    public function getTypeId()
    {
        return $this->type_Id;
    }
}