<?php

require_once('database.php');

class user
{
    private $name;
    private $first_name;
    private $password;
    private $email;
    private $pdo;
    private $id;
    private $admin;   
    
    public function __construct(database $db)
    {
        $this->pdo = $db->connectDatabase();
        // $this->name=$name;
        // $this->first_name=$first_name;
        // $this->password=$password;
        // $this->email=$email;   
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getname()
    {
        return $this->name;
    }
    public function setname($name)
    {
        $this->name = $name;
    }

    public function getfirst_name()
    {
        return $this->first_name;
    }

    public function setfirst_name($first_name)
    {
        return $this->first_name = $first_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAdmin() {
        return $this-> admin;
    }

    public function setAdmin($admin) {
        return $this-> admin = $admin;
    }        
    
    public function newUser()
    {

        try {

            $sql = "INSERT INTO user (name, first_name, email, password, admin) VALUES (:name, :first_name, :email, :password, admin)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':password', $this->password);
            

            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {

            if ($e->getCode() === '23000') {
                echo "Cette adresse email est déjà utilisée.";
            } else {
                echo "Erreur: " . $e->getMessage();
            }
            return false;
        }
    }
    public function connectUser()
    {
        try {
            $sql = "SELECT password, first_name, id, name, admin FROM user WHERE email=:email";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->execute();

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hashedPassword = $row['password'];
                $first_name = $row['first_name'];
                $name = $row['name'];
                $id = $row['id'];
                $admin = $row['admin'];

                if (password_verify($this->password, $hashedPassword)) {
                    session_start();
                    $_SESSION['email'] = $this->email;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['name'] = $name;
                    $_SESSION['id'] = $id;
                    $_SESSION['admin'] = $admin;
                    return true;
                } else {
                    echo "Le mot de passe renseigné n'existe pas";                    
                    header('Location ../forms/form_login.php');
                    return false;
                }
            } else {
                echo "l'email renseigné n'existe pas";                
                header('Location ../forms/form_login.php');
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
            return false;
        }
    }

    public function updateUser()
    {
        try {

            $sql = "UPDATE user SET name=:name, first_name=:first_name, email=:email WHERE id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':id', $this->id);            
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }

    public function updatePassword()
    {

        try {
            $sql = "UPDATE user SET password=:password WHERE id=:id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':password', $this->password);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo " Une erreur s'est produite lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }

    public function getPassword()
    {

        try {
            $sql = "SELECT password FROM user WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
            $stmt->execute();
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return $row['password'];
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo " Une erreur s'est produite lors de la connexion à la BDD" . $e->getMessage();
            return false;
        }
    }
}
