<?php
    createComment();
?>

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post">
        <div class="form-group">
            <label for="comment_author">Name</label>
            <input class="form-control" type="text" name="comment_author" id="">
        </div>
        <div class="form-group">
            <label for="comment_email">Email</label>
            <input class="form-control" type="email" name="comment_email" id="">
        </div>
        <div class="form-group">
            <label for="comment_content">Comment</label>
            <textarea class="form-control" rows="3" name="comment_content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
    </form>
</div>

<hr>