<?php
deletePost();
bulkOptions();
?>
<form action="" method="post">

    <table class="table table-hover table-striped">
        <div id="bulkOptionsContainer" class="col-xs-4">
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Bulk Options</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div id="buttons" class="col-xs-4">
            <input type="submit" value="Apply" name="submitBulk" class="btn btn-success">
            <a class="btn btn-primary" href="posts.php?source=add_post" role="button">Add Post</a>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date</th>
                <th>Tags</th>
                <th>Category</th>
                <th>Comments</th>
                <th>Image</th>
                <th class="text-center">Status</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            showAllPosts();
        ?>
        </tbody>
    </table>

</form>
