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
                <h1 class="page-header">User</h1>

                <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    } else {
                        $source = "";
                    }
                    switch ($source) {
                        case 'add_user':
                            include "inc/add_user.php";
                            break;
                        case 'edit_user':
                            include "inc/edit_user.php";
                            break;

                        default:
                            include "inc/view_all_users.php";
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