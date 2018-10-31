<?php
//Header :
include('./includes/header.php');
if(isset($_POST['_search']))
{
    header('Location: search.php');
}
if(isset($_POST['create_comment'])){
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    $add_comment = $Comment->add_new_comment($_GET['id'],$comment_author,$comment_email,$comment_content);
}

?>
    <?php 
//navgation
include('./includes/navigation.php');
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                <?php if(isset($_GET['id'])){
    $post_id=$Post->get_all_post_by_id($_GET['id']);
    $comment_id = $Comment ->get_comment_by_id($_GET['id']);
    
} ?>
                <!-- Title -->
                <h1>
                    <?php echo $post_id['post_title'] ?>
                </h1>

                <!-- Author -->
                <p class="lead">
                    by
                    <a href="#">
                        <?php echo $post_id['post_author'] ?>
                    </a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p>
                    <span class="glyphicon glyphicon-time"></span> Posted on
                    <?php echo $post_id['post_date'] ?>
                </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="./image/<?php echo $post_id['post_image'] ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead">
                    <?php echo $post_id['post_content'] ?>
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">

                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="Author">Email</label>
                            <input type="email" name="comment_email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php 
                foreach($comment_id as $cmd){
                    echo'
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="./image/author-12.jpg" alt="">
                    </a>
                    <div class="media-body">'.$cmd['comment_author'].'
                        <h4 class="media-heading">
                            <small>'.$cmd['comment_date'].'</small>
                        </h4>
                        '.$cmd['comment_content'].'
                    </div>
                </div>';}?>


            </div>

            
                <?php include('./includes/slidebar.php') ?>

            <!-- Blog Sidebar Widgets Column -->

            <!-- /.row -->



            <?php 
//Footer
include('./includes/footer.php');
?>