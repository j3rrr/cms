<?php
    include "inc/header.php";
?>

<!-- Navigation -->
<?php include "inc/navigation.php";?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comments</h1>

                <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }
                    switch ($source) {
                        case 'add_comment':
                            include "inc/add_comment.php";
                            break;
                        case 'edit_comment':
                            include "inc/edit_comment.php";
                            break;

                        default:
                            include "inc/view_all_comments.php";
                            break;
                    }

                ?>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "inc/footer.php";?>