<?php 
    require_once('./src/init.php');
    if(is_login())
    {
        redirect('index.php');
    }
    if(isset($_POST['_login'])){
        if(isset($_POST['_txtUsername']) && isset($_POST['_txtpassword'])){
            $username=$_POST['_txtUsername'];
            $password=$_POST['_txtpassword'];
            if($User->login($username,$password))
            {
                header('location: search.php');
            }
            else
            {
                echo '<h1>Your username Or password incorrect</h1>';
            }
        }
    }

?>
<form action="" method="post">
<div class="well">
    <h4>Login</h4>
    <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" name="_txtUsername">
    </div>
    <label>Password</label>
    <div class="input-group">
        <input type="text" class="form-control" name="_txtpassword">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit" name="_login">
                connexion
            </button>
        </span>
    </div>
    <!-- /.input-group -->
</div>
</form>
