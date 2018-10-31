
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <h1 class="page-header">
                <?php $title= isset($_GET['id'])? "Edit Post": "Add Post"; echo $title;?>
                </h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" value="<?php if(isset($_GET['id'])):
 echo $post_edit['post_title']; endif ?>">
    </div>

        <div class="form-group">
    <label for="category">Category</label>
    <select name="post_category" id="">
    <?php 
    if(isset($_GET['id'])):
        foreach($category as $all_category){
            echo '
            <option '?><?php if($category_name['category_id']==$all_category['category_id']): echo 'selected'; endif; echo ' value="'.$all_category['category_id'].'">'.$all_category['category_name'].'</option>
            ';
        }   
    else:
        foreach($category as $all_category){
            echo '
            <option value="'.$all_category['category_id'].'">'.$all_category['category_name'].'</option>
            ';
        }   
    endif
        
    ?>
    
    </select>
    
    </div>


    <!-- <div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="">
        
    </select>
    
    </div> -->





    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" value="<?php if(isset($_GET['id'])):
 echo $post_edit['post_author']; endif?>">
    </div>
    
    

    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    
    
    
<div class="form-group">
        <img src="../image/<?php if(isset($_GET['id'])): echo $post_edit['post_image']; endif?>" width="100" alt="..">
        <input type="file" name="image" value="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php if(isset($_GET['id'])): echo $post_edit['post_tags']; endif?>">
    </div>
    
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="10">
        <?php if(isset($_GET['id'])): echo $post_edit['post_content']; endif?>
        </textarea>
    </div>
    
    

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="<?php $b= isset($_GET['id'])? "Modifer": "ajouter"; echo $b;?>"/>
    </div>


</form>
</div>
</div>
</div>
</div>
