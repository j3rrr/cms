<?php
include "inc/header.php";
$message = "";
if (isset($_POST['submit'])) {
    if (!empty($_POST['user_username']) && !empty($_POST['user_email']) && !empty($_POST['user_password'])) {
        submitRegUser();
        $message = "<div class='alert alert-success'>Registration successful. You can now log in</div>";
    } elseif (empty($_POST['user_username']) || empty($_POST['user_email']) || empty($_POST['user_password'])) {
        $message = "<div class='alert alert-danger'>Fields can not be empty</div>";
    }
}
?>


<!-- Navigation -->

<?php  include "inc/navigation.php"; ?>



<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <?php
                        //if (isset($_GET['reg']) && $_GET['reg'] == "s") {
                            echo $message;
                        //}
                        ?>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="user_username" class="sr-only">username</label>
                                <input type="text" name="user_username" id="user_username" class="form-control"
                                    placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="user_email" class="sr-only">Email</label>
                                <input type="email" name="user_email" id="user_email" class="form-control"
                                    placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="user_password" class="sr-only">Password</label>
                                <input type="user_password" name="user_password" id="key" class="form-control"
                                    placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "inc/footer.php";?>
