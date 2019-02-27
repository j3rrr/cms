<?php

    $comment_data = getCommentData();

    if (isset($_POST['edit_comment'])) {
        submitEditComment();
    }

?>
<p><a class="btn btn-primary" href="comments.php" role="button">Back</a></p>
<?php
    if (isset($_GET['update']) && $_GET['update'] == 's') {
        echo "<div class='alert alert-success'>Successfully updated Comment</div>";
    }
?>



<form action="comments.php?source=edit_comment&c_id=<?php echo $comment_data['comment_id'] ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <label for="comment_author">Author</label>
        <input value="<?php echo $comment_data['comment_author']; ?>" class="form-control" type="text"
            name="comment_author">
    </div>
    <div class="form-group">
        <label for="comment_email">Email</label>
        <input value="<?php echo $comment_data['comment_email']; ?>" class="form-control" type="text"
            name="comment_email">
    </div>
    <div class="form-group">
        <label for="comment_post_id">On Post</label>
        <select name="comment_post_id" class="form-control">
            <?php
                $query = "SELECT * FROM posts";
                $select_posts = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_posts)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<option value='{$post_id}'>{$post_title}</option>";
                }

                queryFailed($select_posts);

            ?>
        </select>
    </div>
    <div class="form-group">
        <select name="comment_status" id="">
            <option value="unapproved">Comment Status</option>
            <option value="approved">Approved</option>
            <option value="unapproved">Unapproved</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment_content">Comment Content</label>
        <textarea class="form-control " name="comment_content" id="" cols="30"
            rows="10"><?php echo $comment_data['comment_content']; ?></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_comment" value="Edit Comment">
    </div>
</form>