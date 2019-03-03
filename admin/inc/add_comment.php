<?php
    addComment();
?>

<p><a class="btn btn-primary" href="comments.php" role="button">Back</a></p>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="comment_author">Author</label>
        <input class="form-control" type="text" name="comment_author">
    </div>
    <div class="form-group">
        <label for="comment_email">Email</label>
        <input class="form-control" type="text" name="comment_email">
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
        <textarea class="form-control " name="comment_content" id="editor" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_comment" value="Add Comment">
    </div>
</form>
