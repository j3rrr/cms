<?php

$user_data = getUserData();

if (isset($_POST['edit_user'])) {
    submitEditUser();
}

?>
<p><a class="btn btn-primary" href="users.php" role="button">Back</a></p>
<?php
if (isset($_GET['update']) && $_GET['update'] == 's') {
    echo "<div class='alert alert-success'>Successfully updated User</div>";
}
?>



<form action="users.php?source=edit_user&u_id=<?php echo $user_data['user_id'] ?>" method="post"
    enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_username">Username</label>
        <input value="<?php echo $user_data['user_username']; ?>" class="form-control" type="text" name="user_username">
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        <input value="<?php echo $user_data['user_password']; ?>" class="form-control" type="password"
            name="user_password">
    </div>
    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input value="<?php echo $user_data['user_firstname']; ?>" class="form-control" type="text"
            name="user_firstname">
    </div>
    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input value="<?php echo $user_data['user_lastname']; ?>" class="form-control" type="text" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_data['user_email']; ?>" type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <span>from:
            <?php echo $user_data['user_role']; ?> to</span>
        <select name="user_role">
            <?php
            if ($user_data['user_role'] == 'admin') {
                echo "
                    <option value='admin'>Admin</option>
                    <option value='subscriber'>Subscriber</option>
                    ";
            } elseif ($user_data['user_role'] == 'subscriber') {
                echo "
                    <option value='subscriber'>Subscriber</option>
                    <option value='admin'>Admin</option>
                    ";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <img width="100px" src="../img/user/<?php echo $user_data['user_image']; ?>">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
    </div>
</form>
