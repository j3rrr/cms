<?php
    addPost();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Title</label>
        <input class="form-control" type="text" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Category</label>
        <input class="form-control" type="text" name="post_category_id">
    </div>
    <div class="form-group">
        <label for="post_author">Author</label>
        <input class="form-control" type="text" name="post_author">
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value="draft">Post Status</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_tag">Post Tags</label>
        <input type="text" class="form-control" name="post_tag">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control " name="post_content" id="" cols="30" rows="10">
         </textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_post" value="Add Post">
    </div>
</form>