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

                    <div class="col-xs-6">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <?php insert_categories(); ?>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <?php

                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                            }
                            include "includes/update_categories.php";

                        ?>
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th style='text-align: center;'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php find_all_categories(); ?>
                            <?php delete_categories(); ?>
                            </tbody>
                        </table>
                    </div>

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

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>

