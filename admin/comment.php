<?php include('./includes/header.php') ?>
<?php 
    if(isset($_GET['delete_comment']) && !empty($_GET['delete_comment']))
    {
        $delete_comment =$Comment->delete_comment($_GET['delete_comment']);
        header('location: comment.php');
    }
    if(isset($_GET['status']) && !empty($_GET['status']) && isset($_GET['updated']) && !empty($_GET['updated']))
    {
        $update_comment_status = $Comment->update_status_comment($_GET['updated'],$_GET['status']);
        header('location: comment.php');
    }

?>
<?php include('./includes/navigation.php') ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-12">
                <?php
                    echo'
                    <h1 class="page-header">
                    List Comment
                    </h1>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>author</th>
                                <th>email</th>
                                <th>centent</th>
                                <th>status</th>
                                <th>Response to</th>
                                <th>date</th>
                                <th>approve</th>
                                <th>unapprove</th>
                                <th>delete</th>
                            </tr>
                        </thead>
                        <tbody>';
                            foreach($comment as $ps)
                            {
                                echo'
                                <tr>
                                    <td>'.$ps['comment_id'].'</td>
                                    <td>'.$ps['comment_author'].'</td>
                                    <td>'.$ps['comment_email'].'</td>
                                    <td>'.substr($ps['comment_content'],0,50).'...</td>
                                    <td>'.$ps['comment_status'].'</td>
                                    <td><a  href="../post.php?id='.$ps['comment_post_id'].'" class="btn btn-link btn-xs">Example post '.$ps['comment_post_id'].'</a></td>
                                    <td>'.$ps['comment_date'].'</td>
                                    <td><a  href="comment.php?updated='.$ps['comment_id'].'&status=approve" class="btn btn-success btn-xs">approve</a></td>
                                    <td><a  href="comment.php?updated='.$ps['comment_id'].'&status=unapprove" class="btn btn-primary btn-xs">unapprove</a></td>
                                    <td><a  href="comment.php?delete_comment='.$ps['comment_id'].'" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td> 
                                </tr>';
                            }
                            echo'
                        </tbody>
                    </table>';
                ?>
            </div>
        </div>
    </div>
</div>
<?php include('./includes/footer.php') ?>