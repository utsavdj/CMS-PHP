<?php include "includes/admin_header.php" ?>
<?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $select_user_profile = mysqli_query($connection, $query);
        confirmQuery($select_user_profile);
        while($row = mysqli_fetch_assoc($select_user_profile)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
        }
    }

    if(isset($_POST['update_profile'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
//        $user_role = $_POST['user_role'];
        $username = $_POST['username'];

    //        $post_image = $_FILES['post_image']['name'];
    //        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];

    //        move_uploaded_file($post_image_temp, "../images/{$post_image}");
    //        if(empty($post_image)){
    //            $query = "SELECT * FROM posts WHERE post_id = '{$edit_post_id}'";
    //            $select_image = mysqli_query($connection, $query);
    //            confirmQuery($select_image);
    //            while($row = mysqli_fetch_assoc($select_image)){
    //                $post_image = $row['post_image'];
    //            }
    //        }

        $query = "UPDATE users SET user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', 
                  username='{$username}', user_email='{$user_email}', user_password='{$user_password}' WHERE user_id = '{$user_id}'";
        $update_profile_query = mysqli_query($connection, $query);
        confirmQuery($update_profile_query);
        if($update_profile_query){
            header("Location: ../includes/logout.php");
        }
    }
?>

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


                </div>
            </div>
            <!-- /.row -->

            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="user_firstname">First Name</label>
                    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                </div>
                <div class="form-group">
                    <label for="user_lastname">Last Name</label>
                    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                </div>
                <div class="form-group">
                    <label for="post_category_id" style="display: block;">User Role</label>
                    <!--        <input type="text" value="--><?php //echo $post_category_id;?><!--" class="form-control" name="post_category_id">-->
                    <select disabled class="form-control" name="user_role" style="min-width: 260px; width: auto;">
                        <option hidden value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
                        <?php
                        if($user_role == "Subscriber") {
                            echo "<option value='Admin'>Admin</option>";
                        }else{
                            echo "<option value='Subscriber'>Subscriber</option>";
                        }
                        ?>

                        <!--                        --><?php
                        //            $query = "SELECT * FROM users";
                        //            $select_users = mysqli_query($connection, $query);
                        //            confirmQuery($select_users);
                        //            while ($row = mysqli_fetch_assoc($select_users)) {
                        //                $user_id = $row['user_id'];
                        //                $user_role = $row['user_role'];
                        //                echo "<option value='{$user_id}'>{$user_role}</option>";
                        //            }
                        //            ?>
                    </select>
                </div>

                <!--    <div class="form-group">-->
                <!--        <label for="post_image">Post Image</label>-->
                <!--        <input type="file" name="post_image">-->
                <!--    </div>-->
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="user_email">Email</label>
                    <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                </div>
                <div class="form-group">
                    <label for="user_password">Password</label>
                    <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                </div>
                <div class="form-group">
                    <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
                </div>
            </form>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php"; ?>