<p><a class="btn btn-primary" href="users.php?source=add_user" role="button">Add User</a></p>

<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th class="text-center">Role</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            showAllUsers();
        ?>
    </tbody>
</table>

<?php
    deleteUser();
// updateCommentStatus();
?>