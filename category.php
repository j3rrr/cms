<?php
    include "inc/header.php";
    $post_data = getPostDataByCatID();
?>

<!-- Navigation -->
<?php include 'inc/navigation.php';?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php foreach ($post_data as $key => $val) {?>
            <?php if ($val['post_status'] == 'published') {?>
            <!-- Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $val['post_id']; ?>"><?php echo $val['post_title']; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $val['post_author']; ?></a>
            </p>
            <p>
                <span class="glyphicon glyphicon-time"></span> <?php echo $val['post_date']; ?>
            </p>
            <hr />
            <img class="img-responsive" src="img/<?php echo $val['post_image']; ?>" alt="" />
            <hr />
            <p>
                <?php excerpt($val['post_content'], 160);?>
            </p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr />

            <?php }}?>



        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'inc/sidebar.php';?>

    </div>
    <!-- /.row -->

    <hr />

    <?php include 'inc/footer.php';?>