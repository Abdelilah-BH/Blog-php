<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">
                <?php $title= isset($_GET['id'])? "Edit User": "Add User"; echo $title;?>
                </h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php if(isset($_GET['id'])):
 echo $user_edit['user_firstname']; endif ?>">
    </div>
    <div class="form-group">
        <label for="lastname">lastname</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php if(isset($_GET['id'])):
 echo $user_edit['user_lastname']; endif ?>">
    </div>


        <div class="form-group">
    <label for="role">Role</label>
    <select name="user_role" id="">
    <option>admin</option>;
    <option>subscribe</option>;
    <?php if(isset($_GET['id'])):
    echo '<option selected>'.$user_edit['user_role'].'</option>'; endif?>
    </select>
    
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" value="<?php if(isset($_GET['id'])):
    echo $user_edit['username']; endif?>">
    </div>
    


    <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" name="user_email" value="<?php if(isset($_GET['id'])): echo $user_edit['user_email']; endif?>">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="user_password" value="<?php if(isset($_GET['id'])): echo $user_edit['user_password']; endif?>">
    </div>
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="<?php $b= isset($_GET['id'])? "Modifer": "ajouter"; echo $b;?>"/>
    </div>


</form>
</div>
</div>
</div>
</div>
