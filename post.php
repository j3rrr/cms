<?php
    include "inc/header.php";
    $post_data = getPostData();
?>

<!-- Navigation -->
<?php include 'inc/navigation.php';?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_data['post_id']; ?>"><?php echo $post_data['post_title']; ?></a>
                <?php
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin' && isset($_GET['p_id'])) {
                    echo "<a href='admin/posts.php?source=edit_post&p_id={$_GET['p_id']}'><i class='fa fa-pencil-square-o'></i></a>";
                }
                ?>
            </h2>

            <p class="lead">
                by <a href="index.php"><?php echo $post_data['post_author']; ?></a>
            </p>
            <p>
                <span class="glyphicon glyphicon-time"></span> <?php echo $post_data['post_date']; ?>

            </p>
            <hr />
            <img class="img-responsive" src="img/<?php echo $post_data['post_image']; ?>" alt="" />
            <hr />
            <p>
                <?php echo $post_data['post_content']; ?>

            </p>


            <hr />
            <!-- Blog Comments -->
            <?php include 'inc/view_comments.php';?>
            <?php include 'inc/comment_form.php';?>
        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'inc/sidebar.php';?>

    </div>
    <!-- /.row -->

    <hr />

    <?php include 'inc/footer.php';?>
