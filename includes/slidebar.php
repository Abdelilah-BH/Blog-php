<div class="col-md-4">
<!-- Blog Search Well -->
<form action="search.php" method="post">
<div class="well">
    <h4>Blog Search</h4>
    <div class="input-group">
        <input type="text" class="form-control" name="_txtSearch">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" name="_search">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
    <!-- /.input-group -->
</div>
</form>
<!-- Login -->
<?php
include './login.php';
?>
<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php
            foreach($category as $cat){
            echo'
                <li><a href="#">'.$cat['category_name'].'</a>
                </li>';
            }
            ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Side Widget Well</h4>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
</div>

</div>

</div>

            <hr>