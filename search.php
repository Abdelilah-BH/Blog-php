<?php
//Header :
include('./includes/header.php');
    if(!empty($_POST['_txtSearch']))
    {
        $search = $_POST['_txtSearch'];
        $post= $Post->get_all_post_search($search);
    }
?>
<body>

<?php 
//navgation
include('./includes/navigation.php');
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
                <!-- First Blog Post -->
                <?php
                foreach($post as $p){
                    echo'
                <h2>
                    <a href="#">'.$p['post_title'].'</a>
                </h2>
                <p class="lead">
                    by <a href="index.php">'.$p['post_author'].'</a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August '.$p['post_date'].'</p>
                <hr>
                <img class="img-responsive" src="./image/'.$p['post_image'].'" alt="">
                <hr>
                <p>'.$p['post_content'].'</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>';
                }
                ?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

        <!-- /.row -->
<?php include('./includes/slidebar.php') ?>
<?php 
//Footer
include('./includes/footer.php');
?>
