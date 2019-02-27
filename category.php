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

            <!-- Blog Post -->
            <h2>
                <a href="#"><?php echo $val['post_title']; ?></a>
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

            <?php }?>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form">
                    <div class="form-group">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                    commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc
                    ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include 'inc/sidebar.php';?>

    </div>
    <!-- /.row -->

    <hr />

    <?php include 'inc/footer.php';?>