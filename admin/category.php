<?php include('./includes/header.php') ?>
<?php
    if(isset($_POST['add_cat']))
    {
        $cat_name=$_POST['category_name'];
        if($cat_name!="" && !empty($cat_name))
        {
            $category_list = $Category->add_new_category($cat_name);
            header('location: category.php');
        }
    }
    if(isset($_POST['update_cat']))
    {  
        $cat_edit = $_POST['category_update'];
        $id = $_GET['id'];
        if(isset($id))
        {
            $category_Edit = $Category->edit_category($id,$cat_edit);
            header('location: category.php');
        }
    }
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $category_delete = $Category->delete_category($id);
        header('location: category.php');
    }
?>
<?php include('./includes/navigation.php') ?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        <div class="col-sm-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">category name</label>
                                    <input type="text" class="form-control" name="category_name">
                                </div>
                                    <button type="submit" class="btn btn-primary" name="add_cat">Add Category</button>
<?php
 if(isset($_GET['id']))
 {
     $cat_id = $_GET['id'];
     $category_name = $Category->get_all_category_by_id($cat_id);
 
 echo'                                
                                <div class="form-group">
                                </br>
                                    <label for="">Update Categorie</label>
                                    <input type="text" class="form-control" name="category_update" value="'.$category_name['category_name'].'">
                                </div> 
                                <button type="submit" class="btn btn-primary" name="update_cat">Edit Category</button>
                            </form>';
 }
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach($category as $cat)
                                        {
                                            echo'<tr>
                                            <td>'.$cat['category_id'].'</td>
                                            <td>'.$cat['category_name'].'</td>
                                            <td>
                                            <a  href="category.php?delete='.$cat['category_id'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                                            <a href="category.php?id='.$cat['category_id'].'" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                            </td>  
                                    </tr>';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include('./includes/footer.php') ?>