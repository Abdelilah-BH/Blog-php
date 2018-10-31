<?php include('./includes/header.php') ?>
<?php 
if(isset($_GET['delete_user']))
{
    $user_delete = $User->delete_user($_GET['delete_user']);
    header('location: user.php');
}
?>
<?php include('./includes/navigation.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <?php
                if(isset($_GET['source'])){
                    $source = $_GET['source']; 
                }
                else{
                    $source ='';
                }
                switch($source){
                    case 'add_user':
                    if(isset($_POST['create_user'])):
                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $user_role = $_POST['user_role'];
                        $user_username = $_POST['username'];
                        $user_email = $_POST['user_email'];
                        $user_password = $_POST['user_password'];
                        $add_user = $User->add_user($user_username,$user_password,$user_firstname,$user_lastname,$user_email,"",$user_role,""); 
                    endif;
                    include './add_user.php';
                    break;
                    case 'edit_user':
                    if(isset($_GET['id'])):
                    $id = $_GET['id'];
                    $user_edit = $User->get_all_user_by_id($id);
                    if(isset($_POST['create_user'])):
                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $user_role = $_POST['user_role'];
                        $user_username = $_POST['username'];
                        $user_email = $_POST['user_email'];
                        $user_password = $_POST['user_password'];
                        $edit_user =$User->edit_user($_GET['id'],$user_username,$user_password,$user_firstname,$user_lastname,$user_email,$user_role); 
                    endif;
                    include './add_user.php';
                    endif;
                    break;
                    default:
                    echo'
                    <h1 class="page-header">
                    List User
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>username</th>
                                <th>firstname</th>
                                <th>lastname</th>
                                <th>email</th>
                                <th>role</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($user as $us)
                            {
                                echo'
                                <tr>
                                    <td>'.$us['user_id'].'</td>
                                    <td>'.$us['username'].'</td>
                                    <td>'.$us['user_firstname'].'</td>
                                    <td>'.$us['user_lastname'].'</td>
                                    <td>'.$us['user_email'].'</td>
                                    <td>'.$us['user_role'].'</td>
                                    <td>
                                    <a  href="user.php?delete_user='.$us['user_id'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td> 
                                    <td>
                                    <a href="user.php?source=edit_user&id='.$us['user_id'].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    </td>  
                                </tr>';
                            }
                            echo'
                        </tbody>
                    </table>';
                    break;
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php') ?>