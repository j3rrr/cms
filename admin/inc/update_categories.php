<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">New Category Title</label>
        <?php
            if (isset($_GET['edit'])) {
                $get_cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id LIKE {$get_cat_id}";
                $select_categories_id = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_categories_id)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                ?>
        <input class="form-control" type="text" name="cat_title"
            value="<?php if (isset($cat_title)) {echo $cat_title;}?>">

        <?php }}
            if (isset($_POST['update_cat'])) {
                $get_cat_title = $_POST['cat_title'];
                $query = "UPDATE categories SET cat_title = '{$get_cat_title}' WHERE cat_id = {$cat_id}";
                $update_query = mysqli_query($connection, $query);
                if (!$update_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            }

        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
    </div>
</form>