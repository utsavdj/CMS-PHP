<?php
    if(isset($_POST['create_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];

//        $post_image = $_FILES['post_image']['name'];
//        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
//        $post_date = date('d-m-y');


//        move_uploaded_file($post_image_temp, "../images/{$post_image}");

        $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) VALUES('{$user_firstname}',
        '{$user_lastname}', '{$user_role}', '{$username}', '{$user_email}', '{$user_password}')";

        $create_user_query = mysqli_query($connection, $query);
        confirmQuery($create_user_query);
        header("Location: users.php");
    }

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="post_category_id" style="display: block;">User Role</label>
        <!--        <input type="text" value="--><?php //echo $post_category_id;?><!--" class="form-control" name="post_category_id">-->
        <select class="form-control" name="user_role" style="min-width: 260px; width: auto;">
            <option hidden value="subscriber">---Select Options---</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
<!--            --><?php
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
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
        <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
    </div>
</form>