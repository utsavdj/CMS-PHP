<?php
    function confirmQuery($result){
        global $connection;
        if (!$result){
            die("Query Failed: " . mysqli_error($connection));
        }
    }

    function currentDate(){
        global $connection;
        $query = "SELECT NOW()";
        $date_query = mysqli_query($connection, $query);
        confirmQuery($date_query);
    }

    function insert_categories(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)){
                echo "<div class='alert alert-danger'>This field should not be empty.</div>";
            }else{
                $query = "INSERT INTO categories(cat_title) VALUE ('{$cat_title}')";
                $create_category_query = mysqli_query($connection, $query);
                if(!$create_category_query){
                    die("Query Failed: " . mysqli_error($connection));
                }
            }
        }
    }

    function find_all_categories(){
        global $connection;
        $query = "SELECT * FROM categories";
        $select_categories_sidebar = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_categories_sidebar)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td style='text-align: center;'><a href='categories.php?delete={$cat_id}' class='btn btn-danger'>Delete</a><a style='margin-left: 15px;' href='categories.php?edit={$cat_id}' class='btn btn-primary'>Edit</a></td>";
            echo "</tr>";
        }
    }

    function delete_categories(){
        global $connection;
        if(isset($_GET['delete'])){
            $delete_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = '{$delete_cat_id }'";
            $delete_category_query = mysqli_query($connection, $query);
            header("Location: categories.php");
            if(!$delete_category_query){
                die("Query Failed: " . mysqli_error($connection));
            }
        }
    }

?>