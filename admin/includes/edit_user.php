<?php
    if(isset($_GET['u_id'])) {
        $edit_user_id = $_GET['u_id'];
        $query = "SELECT * FROM users WHERE user_id = {$edit_user_id}";
        $select_user_by_id = mysqli_query($connection, $query);
        confirmQuery($select_user_by_id);
        while ($row = mysqli_fetch_assoc($select_user_by_id)) {
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_role = $row['user_role'];
            $username = $row['username'];
//            $post_image = $row['post_image'];
            $user_email = $row['user_email'];
            $user_password = $row['user_password'];
//            $post_date = $row['post_date'];

        }
    }

    if(isset($_POST['edit_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
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

        $query = "UPDATE users SET user_firstname='{$user_firstname}', user_lastname='{$user_lastname}', user_role='{$user_role}', 
                  username='{$username}', user_email='{$user_email}', user_password='{$user_password}' WHERE user_id = '{$edit_user_id}'";
        $update_user_query = mysqli_query($connection, $query);
        confirmQuery($update_user_query);
        if($update_user_query){
            header("Location: users.php");
        }
    }
?>

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
        <select class="form-control" name="user_role" style="min-width: 260px; width: auto;">
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
        <input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
    </div>
</form>