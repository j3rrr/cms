<p><a class="btn btn-primary" href="posts.php?source=add_post" role="button">Add Post</a></p>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Tags</th>
            <th>Cat ID</th>
            <th>Comments</th>
            <th>Image</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            showAllPosts();
        ?>
    </tbody>
</table>

<?php deletePost();?>