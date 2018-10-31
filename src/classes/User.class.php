<?php 

class user
{
    private $connexion;

    function __construct($db)
    {
        $this->connexion = $db;
    }

    function get_all_user()
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `users`");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }

    function add_user($user_username,$user_password,$user_firstname,$user_lastname,$user_email,$user_image,$user_role,$token)
    {
        try
        {
            $query = $this->connexion->prepare("INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `token`) 
            VALUES(NULL,:user_username,:user_password,:user_firstname,:user_lastname,:user_email,:user_image,:user_role,:token)");
            $query->bindParam(':user_username',$user_username);
            $query->bindParam(':user_password',$user_password);
            $query->bindParam(':user_firstname',$user_firstname);
            $query->bindParam(':user_lastname',$user_lastname);
            $query->bindParam(':user_email',$user_email);
            $query->bindParam(':user_image',$user_image);
            $query->bindParam(':user_role',$user_role);
            $query->bindParam(':token',$token);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    function get_all_user_by_id($id)
    {
        try
        {
            $query= $this->connexion->prepare("SELECT * FROM `users` WHERE user_id=:id");
            $query->bindParam(':id',$id);
            $query -> execute();
            return $query ->fetch(PDO::FETCH_ASSOC);
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    function edit_user($user_id,$username,$user_password,$user_firstname,$user_lastname,$user_email,$user_role)
    {
        try
        {
            $query = $this->connexion->prepare("UPDATE `users` SET `username`=:username, `user_password`=:user_password, `user_firstname`=:user_firstname, `user_lastname`=:user_lastname, `user_email`=:user_email, `user_role`=:user_role WHERE `user_id`=:user_id");
            $query->bindParam(':user_id',$user_id);
            $query->bindParam(':username',$username);
            $query->bindParam(':user_password',$user_password);
            $query->bindParam(':user_firstname',$user_firstname);
            $query->bindParam(':user_lastname',$user_lastname);
            $query->bindParam(':user_email',$user_email);
            $query->bindParam(':user_role',$user_role);
            $query->execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function delete_user($user_id)
    {
        try
        {
            $query = $this->connexion->prepare("DELETE FROM `users` WHERE `user_id`=:user_id ");
            $query->bindParam(':user_id',$user_id);
            $query -> execute();
            return true;
        }
        catch(PDOException $ex)
        {
            die($ex->getMessage());
        }
    }
    public function login($username,$password)
    {
        try
        {
            $query = $this->connexion->prepare("SELECT * FROM `users` WHERE `username`=:username AND `user_password`=:password");
            $query->bindParam(':username',$username);
            $query->bindParam(':password',$password);
            $query->execute();
            $ishere=$query->fetch(PDO::FETCH_ASSOC);
            if($query->rowCount()>0):
                $_SESSION['user_session']=$ishere['user_id'];
                return true;
            else:
                return false;
            endif;
            
        }
        catch(PDOException $ex)
        {
           die($ex->getMessage());
        }
    }
}

?>