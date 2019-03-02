<?php
$cat_data = getCategories();
?>
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Search Tags</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control" />
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form><!-- search form -->
        <!-- /.input-group -->
    </div>

    <!-- Login Form Well -->
    <div class="well">
        <h4>Login</h4>
        <?php
        if (isset($_GET['l']) && $_GET['l'] == 'f') {
            echo "<div class='alert alert-danger'>Login failed. Please try again.</div>";
        }
        ?>
        <form action="inc/login.php" method="post">
            <div class="form-group">
                <input name="user_username" type="text" class="form-control" placeholder="Username" />
            </div>
            <div class="input-group">
                <input name="user_password" type="password" class="form-control" placeholder="Password" />
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Submit</button>
                </span>
            </div>
        </form><!-- login form -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php
                    foreach ($cat_data as $key => $val) {
                        echo "<li><a href='category.php?c_id={$val['cat_id']}'>{$val['cat_title']}</a></li>";
                    }
                    ?>

                </ul>


            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "widget.php" ?>
</div>
