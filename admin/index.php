<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin page
                            <small><?php echo strtoupper(substr((string)$_SESSION['user_firstname'], 0, 1)) . substr((string)$_SESSION['user_firstname'], 1, strlen((string)$_SESSION['user_firstname'])); ?></small>
                        </h1>
<!--                        <ol class="breadcrumb">-->
<!--                            <li>-->
<!--                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>-->
<!--                            </li>-->
<!--                            <li class="active">-->
<!--                                <i class="fa fa-file"></i> Blank Page-->
<!--                            </li>-->
<!--                        </ol>-->
                    </div>
                </div>
                <!-- /.row -->

                <?php
                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);
                    confirmQuery($select_all_posts);
                    $post_counts = mysqli_num_rows($select_all_posts);

                    $query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_all_published_posts = mysqli_query($connection, $query);
                    confirmQuery($select_all_published_posts);
                    $post_published_counts = mysqli_num_rows($select_all_published_posts);

                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_all_draft_posts = mysqli_query($connection, $query);
                    confirmQuery($select_all_draft_posts);
                    $post_draft_counts = mysqli_num_rows($select_all_draft_posts);

                    $query = "SELECT * FROM comments";
                    $select_all_comments = mysqli_query($connection, $query);
                    confirmQuery($select_all_comments);
                    $comment_counts = mysqli_num_rows($select_all_comments);

                    $query = "SELECT * FROM comments WHERE comment_status = 'approved'";
                    $select_all_approved_comments = mysqli_query($connection, $query);
                    confirmQuery($select_all_approved_comments);
                    $comment_approved_counts = mysqli_num_rows($select_all_approved_comments);

                    $query = "SELECT * FROM comments WHERE comment_status = 'disapproved'";
                    $select_all_disapproved_comments = mysqli_query($connection, $query);
                    confirmQuery($select_all_disapproved_comments);
                    $comment_disapproved_counts = mysqli_num_rows($select_all_disapproved_comments);

                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection, $query);
                    confirmQuery($select_all_users);
                    $user_counts = mysqli_num_rows($select_all_users);

                    $query = "SELECT * FROM users WHERE user_role = 'Admin'";
                    $select_all_admin_users = mysqli_query($connection, $query);
                    confirmQuery($select_all_admin_users);
                    $user_admin_counts = mysqli_num_rows($select_all_admin_users);

                    $query = "SELECT * FROM users WHERE user_role = 'Subscriber'";
                    $select_all_sub_users = mysqli_query($connection, $query);
                    confirmQuery($select_all_sub_users);
                    $user_sub_counts = mysqli_num_rows($select_all_sub_users);

                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection, $query);
                    confirmQuery($select_all_categories);
                    $category_counts = mysqli_num_rows($select_all_categories);
                ?>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $post_counts; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $comment_counts; ?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $user_counts; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel" style="background-color: #7570B3; color: #FFFFFF;">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?php echo $category_counts; ?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div style="overflow-x: hidden;" class="col-lg-12">

                        <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['', 'Total'],
                                    <?php
                                    $element_text = ['Published Posts', 'Draft Posts', 'Approved Comments', 'Disapproved Comments', 'Admin', 'Subscribers', 'Categories'];
                                    $element_count = [$post_published_counts, $post_draft_counts, $comment_approved_counts, $comment_disapproved_counts, $user_admin_counts, $user_sub_counts, $category_counts];
                                    for($i=0; $i < sizeof($element_count); $i++){
                                        echo "['{$element_text[$i]}', {$element_count[$i]}],";
                                    }
                                    ?>

//                                    ['Year', 'Sales', 'Expenses', 'Profit'],
//                                    ['2014', 1000, 400, 200],
//                                    ['2015', 1170, 460, 250],
//                                    ['2016', 660, 1120, 300],
//                                    ['2017', 1030, 540, 350]

                                ]);

                                var options = {
                                    chart: {
                                        title: '',
                                        subtitle: '',
                                    },
                                    vAxis: { baseline: 0 }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material1'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                        </script>
                        <div id="columnchart_material1" style="width: 108%; height: 322px;">

                        </div>


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>

        <style>
            g path:nth-child(1) {
                fill: #337AB7;
            }
           g path:nth-child(2) {
                fill: #DB4437;
           }
            g path:nth-child(3) {
                fill: #5CB85C;
            }
           g path:nth-child(4) {
               fill: #DB4437;
           }
            g path:nth-child(5) {
                fill: #F0AD4E;
            }
           g path:nth-child(6) {
               fill: #F0AD4E;
           }
            g path:nth-child(7) {
                fill: #7570B3;
            }

           #columnchart_material1 > div > div > svg > g:nth-child(2){
                display: none!important;
            }
        </style>
