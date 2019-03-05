<?php
include 'db.php';
include '../functions.php';
session_start();

if (isset($_POST['login'])) {
    $sent_user_username = $_POST['user_username'];
    $sent_user_password = $_POST['user_password'];

    $sent_user_username = mysqli_real_escape_string($connection, $sent_user_username);
    $sent_user_password = mysqli_real_escape_string($connection, $sent_user_password);

    $query = "SELECT * FROM users WHERE user_username = '{$sent_user_username}'";
    $select_user_query = mysqli_query($connection, $query);
    queryFailed($select_user_query);
}

while ($row = mysqli_fetch_array($select_user_query)) {
    $db_id = $row['user_id'];
    $db_user_username = $row['user_username'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    $db_user_password = $row['user_password'];
}

$sent_user_password = crypt($sent_user_password, $db_user_password);

if ($sent_user_username === $db_user_username && $sent_user_password === $db_user_password) {
    $_SESSION['username'] = $db_user_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['role'] = $db_user_role;
    header("Location: ../admin/index.php");
} else {
    header("Location: ../index.php?l=f");
}
