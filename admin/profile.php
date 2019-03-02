<?php
include "inc/header.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE user_username = '{$username}' ";
    $select_user_profile_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_user_profile_query)) {
        $user_id        = $row['user_id'];
        $user_password  = $row['user_password'];
        $user_username  = $row['user_username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname  = $row['user_lastname'];
        $user_email     = $row['user_email'];
        $user_image     = $row['user_image'];
        $user_role      = $row['user_role'];
    }
}

if (isset($_POST['edit_profile'])) {
    submitEditProfile();
}
?>

<!-- Navigation -->
<?php include "inc/navigation.php"; ?>

<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Profile</h1>

                <!-- <p><a class="btn btn-primary" href="users.php" role="button">Back</a></p> -->
                <?php
                if (isset($_GET['update']) && $_GET['update'] == 's') {
                    echo "<div class='alert alert-success'>Successfully updated User</div>";
                }
                ?>

                <form action="profile.php?source=profile&u_id=<?php echo $user_id ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="user_username">Username</label>
                        <input value="<?php echo $user_username; ?>" class="form-control" type="text"
                            name="user_username">
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input value="<?php echo $user_password; ?>" class="form-control" type="password"
                            name="user_password">
                    </div>
                    <div class="form-group">
                        <label for="user_firstname">First Name</label>
                        <input value="<?php echo $user_firstname; ?>" class="form-control" type="text"
                            name="user_firstname">
                    </div>
                    <div class="form-group">
                        <label for="user_lastname">Last Name</label>
                        <input value="<?php echo $user_lastname; ?>" class="form-control" type="text"
                            name="user_lastname">
                    </div>
                    <div class="form-group">
                        <label for="user_email">Email</label>
                        <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
                    </div>
                    <div class="form-group">
                        <label for="user_role">Role</label>
                        <span>from:
                            <?php echo $user_role; ?> to</span>
                        <select name="user_role">
                            <?php
                            if ($user_role == 'admin') {
                                echo "
                                    <option value='admin'>Admin</option>
                                    <option value='subscriber'>Subscriber</option>
                                    ";
                            } elseif ($user_role == 'subscriber') {
                                echo "
                                    <option value='subscriber'>Subscriber</option>
                                    <option value='admin'>Admin</option>
                                    ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <img width="100px" src="../img/user/<?php echo $user_image; ?>">
                        <label for="user_image">User Image</label>
                        <input type="file" name="user_image">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="edit_profile" value="Edit Profile">
                    </div>
                </form>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-flui d -->
</div>
<!-- /#page-wrapper -->

<?php include "inc/footer.php"; ?>
