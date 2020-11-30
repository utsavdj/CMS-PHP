<form action="" method="post">
    <?php
    if(isset($_GET['edit'])) {
        ?>
        <div class="form-group">
            <label for="cat-title">Edit Category</label>
            <?php
            $edit_cat_id = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = '{$edit_cat_id}'";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                ?>
                <input value="<?php if ($cat_title) {
                    echo $cat_title;
                } ?>" class="form-control" type="text" name="cat_title">
                <?php
            }
            ?>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update" value="Update Category">
        </div>
        <?php
    }
        if(isset($_POST['update'])){
            $update_cat_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = '{$cat_id}'";
            $update_category_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            if(!$update_category_query){
                die("Query Failed: " . mysqli_error($connection));
            }
        }
        ?>

</form>