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
                    $query = "SELECT * FROM posts";
                    $select_all_from_posts = mysqli_query($connection, $query);
                    $query = "SELECT COUNT(*) AS total FROM posts WHERE post_status = 'published'";
                    $status_count_query = mysqli_query($connection, $query);
                    $post_status_count = mysqli_fetch_assoc($status_count_query);
                    if($post_status_count['total'] == 0){
                        echo "<h2 class='text-center'>Sorry! no posts made yet, please come back later.</h2>";
                    }else {
                        while($row = mysqli_fetch_assoc($select_all_from_posts)){
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = substr($row['post_content'], 0 , 195) . ".....";
                            $post_status =$row['post_status'];
                ?>

                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p>
                                <span class="glyphicon glyphicon-time"></span> <?php echo date('\P\o\s\t\e\d \o\n l jS F\, Y', strtotime($post_date)); ?>
                            </p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span
                                        class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                <?php
                        }
                    }
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>

<!-- Footer -->
<?php include "includes/footer.php"; ?>