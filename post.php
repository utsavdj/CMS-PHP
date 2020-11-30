<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php
            if(isset($_GET['p_id'])){
                $the_post_id = $_GET['p_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id = '{$the_post_id}'";
            $select_all_from_posts = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_from_posts)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo date('\P\o\s\t\e\d \o\n l jS F\, Y', strtotime($post_date)); ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <p style="white-space: pre-line; text-align: justify"><?php echo $post_content; ?></p>
<!--                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>-->

                <hr>

            <?php } ?>

            <!-- Blog Comments -->

            <?php
                if(isset($_POST['create_comment'])){
                    $the_post_id = $_GET['p_id'];
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email, comment_content,
                    comment_status, comment_date) VALUES('{$the_post_id}','{$comment_author}','{$comment_email}',
                    '{$comment_content}', 'disapproved', now())";
                    $create_comment_query = mysqli_query($connection, $query);
                    if(!$create_comment_query){
                        die("Query Failed: " . mysqli_error($connection));
                    }

                    $query = "UPDATE posts SET post_comment_count = (SELECT COUNT(*) FROM comments WHERE comment_post_id = '{$the_post_id}') WHERE post_id = '{$the_post_id}'";
                    $comment_count_query = mysqli_query($connection, $query);
                    if(!$comment_count_query){
                        die("Query Failed: " . mysqli_error($connection));
                    }
                }
            ?>

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="author">Name</label>
                        <input type="text" name="comment_author" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="comment_email" class="form-control">
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

            <?php
                $query = "SELECT * FROM comments WHERE comment_post_id = '{$the_post_id}' AND comment_status = 'approved' ORDER BY comment_id DESC";
                $select_comments = mysqli_query($connection, $query);
                if(!$select_comments){
                    die("Query Failed: " . mysqli_error($connection));
                }
                $i=0;
                while($row = mysqli_fetch_assoc($select_comments)) {
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];
                    $i++;
                    if ($i % 2 != 0) {
            ?>
                        <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo date('l F\ jS, Y \a\t g:i A', strtotime($comment_date));; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
            <?php
                    } else {
            ?>
                        <div class="media" style="margin-left: 74px;">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo date('l F\ jS, Y \a\t g:i A', strtotime($comment_date));; ?></small>
                                </h4>
                                <?php echo $comment_content; ?>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
            <!-- Comment -->
<!--            <div class="media">-->
<!--                <a class="pull-left" href="#">-->
<!--                    <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                </a>-->
<!--                <div class="media-body">-->
<!--                    <h4 class="media-heading">Start Bootstrap-->
<!--                        <small>August 25, 2014 at 9:30 PM</small>-->
<!--                    </h4>-->
<!--                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                    <div class="media">-->
<!--                        <a class="pull-left" href="#">-->
<!--                            <img class="media-object" src="http://placehold.it/64x64" alt="">-->
<!--                        </a>-->
<!--                        <div class="media-body">-->
<!--                            <h4 class="media-heading">Nested Start Bootstrap-->
<!--                                <small>August 25, 2014 at 9:30 PM</small>-->
<!--                            </h4>-->
<!--                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include "includes/footer.php"; ?>