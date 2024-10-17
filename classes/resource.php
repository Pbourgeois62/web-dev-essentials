<?php

require_once('database.php');

class resource{
    private $id;
    private $description;
    private $url;
    private $name;
    private $created_at;
    private $updated_at;
    private $label;
    private $category_id;
    private $pdo;
    private $user_id;

    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();    
    }
// --------!!!!!!!!!!!ATTENTION created_at à parametrer, user id a créer en BDD, à voir comment faire pour techn_id!!!!!!!!!!!-----
    public function newSource()
    {
        try {
            $sql = "INSERT INTO source (url, label, description, user_id, domaine_id,created_at) VALUES (:url, :label, :description, :user_id, :domaine_id, :created_at)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':url', $this->url, PDO::PARAM_STR);
            $stmt->bindParam(':label', $this->label, PDO::PARAM_STR);
            $stmt->bindParam(':description', $this->description, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
            $stmt->bindParam(':category_id', $this->category_id, PDO::PARAM_INT);
            $stmt->bindParam(':created_at', $this->created_at, PDO::PARAM_STR);
            return $stmt->execute();            
        } catch (PDOException $e) {
            die("Erreur lors de la creation du lien" . $e->getMessage());
        }
    }
}
?>