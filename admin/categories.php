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
                <h1 class="page-header">Categories</h1>

                <div class="col-sm-6">

                    <?php
                        insertCategoryQuery();
                    ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat_title">Category Title</label>
                            <input class="form-control" type="text" name="cat_title">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                        </div>
                    </form>

                    <?php
                        /**
                         * Show Update Form
                         */
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "inc/update_categories.php";
                        }
                    ?>

                </div>

                <div class="col-sm-6">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                showAllCategories();
                                deleteCategoryQuery();
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include "inc/footer.php";?>