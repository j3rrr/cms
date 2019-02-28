<?php
    $comment_data = getCommentsForPost();
?>

<!-- Posted Comments -->

<!-- Comment -->

<?php foreach ($comment_data as $key => $val) {
        if ($val['comment_status'] == 'approved') {
        ?>
<div class="media">
    <div class="media-body">
        <blockquote>
            <p><?php echo $val['comment_content']; ?></p>
            <small>Posted by <?php echo $val['comment_author'] . ' on <i>' . $val['comment_date'] . '</i>'; ?></small>
        </blockquote>
    </div>
</div>

<?php }}?>