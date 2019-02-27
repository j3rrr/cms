<p><a class="btn btn-primary" href="comments.php?source=add_comment" role="button">Add Comment</a></p>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>On Post</th>
            <th>Comment</th>
            <th>Author</th>
            <th>Email</th>
            <th>Date</th>
            <th class="text-center">Status</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            showAllComments();
        ?>
    </tbody>
</table>

<?php
    deleteComment();
updateCommentStatus();
?>