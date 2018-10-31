<?php 

class post
{
    private $connexion;

    function __construct($db)
    {
        $this->connexion = $db;
    }

    function get_all_post()
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `post`");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }

    function get_all_post_search($search)
    {
        try
        {
            $query= $this->connexion->prepare("SELECT * FROM `post` WHERE post_tags LIKE '%$search%'");
            $query -> execute();
            return $query ->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    function add_post($post_category_id,$post_title,$post_author,$post_image,$post_content,$post_tags,$post_comment_count,$post_status)
    {
        try
        {
            $query = $this->connexion->prepare("INSERT INTO `post` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES(NULL,:post_category_id,:post_title,:post_author,:post_image,:post_content,:post_tags,:post_comment_count,:post_status)");
            $query->bindParam(':post_category_id',$post_category_id,PDO::PARAM_INT);
            $query->bindParam(':post_title',$post_title);
            $query->bindParam(':post_author',$post_author);
            $query->bindParam(':post_image',$post_image);
            $query->bindParam(':post_content',$post_content);
            $query->bindParam(':post_tags',$post_tags);
            $query->bindParam(':post_comment_count',$post_comment_count);
            $query->bindParam(':post_status',$post_status);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    function get_all_post_by_id($id)
    {
        try
        {
            $query= $this->connexion->prepare("SELECT * FROM `post` WHERE post_id=:id");
            $query->bindParam(':id',$id);
            $query -> execute();
            return $query ->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    function edit_post($post_id,$post_category_id,$post_title,$post_author,$post_image,$post_content,$post_tags,$post_comment_count,$post_status)
    {
        try
        {
            $query = $this->connexion->prepare("UPDATE `post` SET `post_category_id`=:post_category_id, `post_title`=:post_title, `post_author`=:post_author, `post_image`=:post_image, `post_content`=:post_content, `post_tags`=:post_tags, `post_comment_count`=:post_comment_count, `post_status`=:post_status WHERE `post_id`=:post_id");
            $query->bindParam(':post_category_id',$post_category_id,PDO::PARAM_INT);
            $query->bindParam(':post_title',$post_title);
            $query->bindParam(':post_author',$post_author);
            $query->bindParam(':post_image',$post_image);
            $query->bindParam(':post_content',$post_content);
            $query->bindParam(':post_tags',$post_tags);
            $query->bindParam(':post_comment_count',$post_comment_count);
            $query->bindParam(':post_status',$post_status);
            $query->bindParam(':post_id',$post_id);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function delete_post($post_id)
    {
        try
        {
            $query = $this->connexion->prepare("DELETE FROM `post` WHERE `post_id`=:post_id ");
            $query->bindParam(':post_id',$post_id);
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