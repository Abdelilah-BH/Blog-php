<?php include('./includes/header.php') ?>
<?php 
if(isset($_GET['delete_post']))
{
    $post_delete = $Post->delete_post($_GET['delete_post']);
    header('location: post.php');
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
                    case 'add_post':
                    if(isset($_POST['create_post'])):
                        $post_title = $_POST['title'];
                        $post_category = $_POST['post_category'];
                        $post_status = $_POST['post_status'];
                        $post_content = $_POST['post_content'];
                        $author = $_POST['author'];
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];
                        $post_tags = $_POST['post_tags'];
                        move_uploaded_file($image_temp,"../image/$image");
                        $add_post = $Post->add_post($post_category,$post_title,$author,$image,$post_content,$post_tags,0,$post_status); 
                    endif;
                    include './add_post.php';
                    break;

                    case 'edit_post':
                    if(isset($_GET['id'])):
                    $id = $_GET['id'];
                    $post_edit = $Post->get_all_post_by_id($id);
                    $category_name =$Category->get_all_category_by_id($post_edit['post_category_id']);
                    if(isset($_POST['create_post'])):
                        $post_title = $_POST['title'];
                        $post_category = $_POST['post_category'];
                        $post_status = $_POST['post_status'];
                        $post_content = $_POST['post_content'];
                        $author = $_POST['author'];
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];
                        $post_tags = $_POST['post_tags'];
                        move_uploaded_file($image_temp,"../image/$image");
                        if(empty($image)):
                        $image = $post_edit['post_image'];
                        endif;
                        $edit_post =$Post->edit_post($_GET['id'],$post_category,$post_title,$author,$image,$post_content,$post_tags,0,$post_status); 
                    endif;
                    include './add_post.php';
                    endif;
                    break;
                    default:
                    echo'
                    <h1 class="page-header">
                    List Post
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>cat</th>
                                <th>title</th>
                                <th>author</th>
                                <th>date</th>
                                <th>image</th>
                                <th>content</th>
                                <th>tags</th>
                                <th>comment</th>
                                <th>status</th>
                                <th>delete</th>
                                <th>edit</th>
                            </tr>
                        </thead>
                        <tbody>';
                            
                            foreach($post as $ps)
                            {
                                echo'
                                <tr>
                                    <td>'.$ps['post_id'].'</td>
                                    <td>'.$ps['post_category_id'].'</td>
                                    <td>'.$ps['post_title'].'</td>
                                    <td>'.$ps['post_author'].'</td>
                                    <td>'.$ps['post_date'].'</td>
                                    <td><img src="../image/'.$ps['post_image'].'" width="100%"/></td>
                                    <td>'.substr($ps['post_content'],0,50).'...</td>
                                    <td>'.$ps['post_tags'].'</td>
                                    <td>'.$ps['post_comment_count'].'</td>
                                    <td>'.$ps['post_status'].'</td>
                                    <td>
                                    <a  href="post.php?delete_post='.$ps['post_id'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td> 
                                    <td>
                                    <a href="post.php?source=edit_post&id='.$ps['post_id'].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
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