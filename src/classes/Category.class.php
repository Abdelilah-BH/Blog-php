<?php

class category
{
    private $connexion;

    public function __construct($db)
    {
        $this->connexion = $db;
    }
    
    public function get_all_category()
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `category`");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function add_new_category($category_name)
    {
        try
        {
            $query = $this->connexion->prepare("INSERT INTO `category` (`category_id`, `category_name`) VALUES (NULL,:category_name);");
            $query->bindParam(':category_name',$category_name);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function get_all_category_by_id($category_id)
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `category` WHERE `category_id`=:category_id LIMIT 1");
            $query->bindParam(':category_id',$category_id);
            $query->execute();
            $category_row = $query->fetch(PDO::FETCH_ASSOC);
            if($query->rowCount()>0)
            {
                return $category_row;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function edit_category($category_id,$category_name)
    {
        try
        {
            $query = $this->connexion->prepare("UPDATE `category` SET `category_name`=:category_name WHERE `category_id`=:category_id ");
            $query -> bindParam(':category_name',$category_name);
            $query->bindParam(':category_id',$category_id);
            $query -> execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function delete_category($category_id)
    {
        try
        {
            $query = $this->connexion->prepare("DELETE FROM `category` WHERE `category_id`=:category_id ");
            $query->bindParam(':category_id',$category_id);
            $query -> execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }

}
?>