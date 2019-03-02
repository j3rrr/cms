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
                <h1 class="page-header">
                    Welcome back <?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname']; ?>
                </h1>
                <?php
                if ($_SESSION['role'] == 'admin') {
                    echo "ADMIN";
                } else {
                    echo 'NO ADMIN';
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
