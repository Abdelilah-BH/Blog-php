<?php

class comment
{
    private $connexion;

    public function __construct($db)
    {
        $this->connexion = $db;
    }

    public function get_all_comment()
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `comment`");
            $query ->execute();
            return $query ->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function get_comment_by_id($comment_post_id)
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `comment` WHERE `comment_post_id`=:comment_id");
            $query ->bindParam(':comment_id',$comment_post_id);
            $query ->execute();
            return $query ->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function delete_comment($comment_id)
    {
        try
        {
            $query = $this->connexion->prepare("DELETE FROM `comment` WHERE `comment_id`=:comment_id");
            $query ->bindParam(':comment_id',$comment_id);
            $query ->execute();
            return true;
        }
        catch(PDOException $ex)
        {
           die($ex->getMessage());
        }
    }
    public function update_status_comment($comment_id,$comment_status)
    {
        try
        {
            $query = $this->connexion->prepare("UPDATE `comment` SET `comment_status`=:comment_status WHERE `comment_id`=:comment_id");
            $query ->bindParam(':comment_id',$comment_id);
            $query ->bindParam(':comment_status',$comment_status);
            $query ->execute();
            return true;
        }
        catch(PDOException $ex)
        {
           die($ex->getMessage());
        }
    }
    public function add_new_comment($comment_post_id,$comment_author,$comment_email,$comment_content)
    {
        try
        {
            $query = $this->connexion->prepare("INSERT INTO `comment` (`comment_id`,`comment_post_id`, `comment_author`,`comment_email`,`comment_content`,`comment_status`) VALUES (NULL,:comment_post_id,:comment_author,:comment_email,:comment_content,'unapprove')");
            $query->bindParam(':comment_post_id',$comment_post_id);
            $query->bindParam(':comment_author',$comment_author);
            $query->bindParam(':comment_email',$comment_email);
            $query->bindParam(':comment_content',$comment_content);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
}

?>