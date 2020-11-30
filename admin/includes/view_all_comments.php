<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Comment</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to</th>
        <th>Date</th>
        <th>Approve</th>
        <th>Disapprove</th>
        <th style="text-align: center">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);
    confirmQuery($select_comments);
    while($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];

        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";

//        $query = "SELECT * FROM categories WHERE cat_id = '{$post_category_id}'";
//        $select_categories_id = mysqli_query($connection, $query);
//        while ($row = mysqli_fetch_assoc($select_categories_id)) {
//            $cat_id = $row['cat_id'];
//            $cat_title = $row['cat_title'];
//            echo "<td>{$cat_title}</td>";
//        }

        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";

        $query = "SELECT * FROM posts WHERE post_id = '{$comment_post_id}'";
        $select_post_id_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_post_id_query)){
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
        }

        echo "<td>{$comment_date}</td>";
        echo "<td><a href='comments.php?approved={$comment_id}'>Approve</a></td>";
        echo "<td><a href='comments.php?disapproved={$comment_id}'>Disapprove</a></td>";
        echo "<td style='width: 144px;'><a href='comments.php?delete={$comment_id}' class='btn btn-danger'>Delete</a><a href='comments.php?source=edit_comment&p_id={$comment_id}' style='margin-left: 10px;' class='btn btn-success'>Edit</a></td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<?php
    if(isset($_GET['disapproved'])){
        $comment_id = $_GET['disapproved'];
        $query = "UPDATE comments SET comment_status = 'disapproved' WHERE comment_id = '{$comment_id}'";
        $disapprove_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");
        confirmQuery($disapprove_comment_query);
    }

    if(isset($_GET['approved'])){
        $comment_id = $_GET['approved'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = '{$comment_id}'";
        $approve_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");
        confirmQuery($approve_comment_query);
    }

    if(isset($_GET['delete'])){
        $comment_id = $_GET['delete'];
        $query = "DELETE from comments WHERE comment_id = {$comment_id}";
        $delete_post = mysqli_query($connection, $query);
        header("Location: comments.php");
        confirmQuery($delete_post);

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