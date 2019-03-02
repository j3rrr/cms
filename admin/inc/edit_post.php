<?php

$post_data = getPostData();

if (isset($_POST['edit_post'])) {
    submitEditPost();
}

?>
<p><a class="btn btn-primary" href="posts.php" role="button">Back</a></p>
<?php
if (isset($_GET['update']) && $_GET['update'] == 's') {
    echo "<div class='alert alert-success'>Successfully updated Post</div>";
}
?>


<form action="posts.php?source=edit_post&p_id=<?php echo $post_data['post_id'] ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input value="<?php echo $post_data['post_title']; ?>" class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Category</label>
        <select name="post_category_id" class="form-control">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            queryFailed($select_categories);

            ?>

        </select>

    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input value="<?php echo $post_data['post_author']; ?>" value="" class="form-control" type="text"
            name="post_author">
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <img width="100px" src="../img/<?php echo $post_data['post_image']; ?>">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tag">Post Tags</label>
        <input value="<?php echo $post_data['post_tag']; ?>" value="" type="text" class="form-control" name="post_tag">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30"
            rows="10"><?php echo $post_data['post_content']; ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_post" value="Edit Post">
    </div>
</form>
