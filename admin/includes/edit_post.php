<?php
    if(isset($_GET['p_id'])) {
        $edit_post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = '{$edit_post_id}'";
        $select_post_by_id = mysqli_query($connection, $query);
        confirmQuery($select_post_by_id);
        while ($row = mysqli_fetch_assoc($select_post_by_id)) {
            $post_id = $row['post_id'];
            $post_author = $row['post_author'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_status = $row['post_status'];
            $post_image = $row['post_image'];
            $post_tags = $row['post_tags'];
            $post_content = $row['post_content'];
            $post_comment_count = $row['post_comment_count'];
            $post_date = $row['post_date'];

        }
    }

    if(isset($_POST['update_post'])){
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];

        move_uploaded_file($post_image_temp, "../images/{$post_image}");
        if(empty($post_image)){
            $query = "SELECT * FROM posts WHERE post_id = '{$edit_post_id}'";
            $select_image = mysqli_query($connection, $query);
            confirmQuery($select_image);
            while($row = mysqli_fetch_assoc($select_image)){
                $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET post_title='{$post_title}', post_category_id='{$post_category_id}', post_author='{$post_author}', 
                  post_status='{$post_status}', post_image='{$post_image}', post_tags='{$post_tags}', post_content='{$post_content}',
                  post_date=now() WHERE post_id = '{$edit_post_id}'";
        $update_post_query = mysqli_query($connection, $query);
        confirmQuery($update_post_query);
        if($update_post_query){
            header("Location: posts.php");
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" value="<?php echo $post_title;?>" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id" style="display: block;">Post Category Id</label>
<!--        <input type="text" value="--><?php //echo $post_category_id;?><!--" class="form-control" name="post_category_id">-->
            <select class="form-control" name="post_category_id" style="min-width: 260px; width: auto;">
                <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                confirmQuery($select_categories);
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
                ?>
            </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" value="<?php echo $post_author;?>" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" value="<?php echo $post_status;?>" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="post_status" style="display: block;">Post Image</label>
        <img width="100" style="margin-top: 5px; margin-bottom: 10px;" src="../images/<?php echo $post_image ?>" alt="image">
        <input type="file"  accept="image" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags;?>" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content;?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
    </div>
</form>