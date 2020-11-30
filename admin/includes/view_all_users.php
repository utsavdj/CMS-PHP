<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
<!--        <th>Date</th>-->
        <th>Admin</th>
        <th>Subscriber</th>
        <th style="text-align: center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);
    confirmQuery($select_users);
    while($row = mysqli_fetch_assoc($select_users)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
//        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
//        echo "<td></td>";
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
        echo "<td style='width: 144px;'><a href='users.php?delete={$user_id}' class='btn btn-danger'>Delete</a><a href='users.php?source=edit_user&u_id={$user_id}' style='margin-left: 10px;' class='btn btn-success'>Edit</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
    if(isset($_GET['change_to_admin'])){
        $the_user_id = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = '{$the_user_id}'";
        $change_to_admin_query = mysqli_query($connection, $query);
        header("Location: users.php");
        confirmQuery($change_to_admin_query);
    }

    if(isset($_GET['change_to_sub'])){
        $the_user_id = $_GET['change_to_sub'];
        $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = '{$the_user_id}'";
        $change_to_sub_query = mysqli_query($connection, $query);
        header("Location: users.php");
        confirmQuery($change_to_sub_query);
    }

    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];
        $query = "DELETE from users WHERE user_id = {$the_user_id}";
        $delete_user = mysqli_query($connection, $query);
        header("Location: users.php");
        confirmQuery($delete_user);

//        $query = "SELECT * FROM comments WHERE comment_id = {$comment_id}";
//        $comment_post_id_query = mysqli_query($connection, $query);
//        confirmQuery($comment_post_id_query);
//        while($row = mysqli_fetch_assoc($comment_post_id_query)){
//            $comment_post_id = $row['comment_post_id'];
//            $query = "UPDATE posts SET post_comment_count = (SELECT COUNT(*) FROM comments WHERE comment_post_id = '{$comment_post_id}') WHERE post_id = '{$comment_post_id}'";
//            $comment_count_query = mysqli_query($connection, $query);
//            confirmQuery($comment_count_query);
//        }
    }
?>