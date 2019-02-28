<?php
function queryFailed($var)
{
    global $connection;
    if (!$var) {
        die('QUERY FAILED' . mysqli_error($connection));
    }
}

/**
 * POST Functions
 */

function getPostData()
{
    global $connection;
    if (isset($_GET['p_id'])) {
        $view_post_id = $_GET['p_id'];

        $query = "SELECT * FROM posts WHERE post_id LIKE {$view_post_id}";
        $select_post_by_id = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($select_post_by_id);
        $post_info = array(
            'post_id' => $row['post_id'],
            'post_category_id' => $row['post_category_id'],
            'post_title' => $row['post_title'],
            'post_author' => $row['post_author'],
            'post_date' => $row['post_date'],
            'post_image' => $row['post_image'],
            'post_content' => $row['post_content'],
            'post_tag' => $row['post_tag'],
            'post_comment_count' => $row['post_comment_count'],
            'post_status' => $row['post_status'],
        );
        return $post_info;
    }
}

function excerpt($string, $len)
{
    if (strlen($string) > $len) {
        echo substr($string, 0, $len) . " ...";
    } else {
        echo $string;
    }
}

function getCategories()
{
    global $connection;
    // $query = "SELECT * FROM categories LIMIT 3 ";
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    $cat_info = array();

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_info[] = $row;
    }

    return $cat_info;

}

function getPostDataByCatID()
{
    global $connection;
    if (isset($_GET['c_id'])) {
        $get_c_id = $_GET['c_id'];

        $query = "SELECT * FROM posts WHERE post_category_id LIKE {$get_c_id}";
        $select_post_by_cat_id = mysqli_query($connection, $query);
        $post_info = array();

        while ($row = mysqli_fetch_assoc($select_post_by_cat_id)) {
            $post_info[] = $row;
        }
        return $post_info;
    }
}

/**
 * COMMENT Functions
 */

function createComment()
{
    global $connection;

    if (isset($_POST['create_comment'])) {
        $post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $comment_date = date('d-m-y');
        $comment_status = "unapproved";

        $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
        $query .= "VALUES({$post_id},'{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now()) ";

        $create_comment_query = mysqli_query($connection, $query);
        if ($create_comment_query) {
            echo "<div class='alert alert-success'>Successfully created Comment. Please wait for approval.</div>";
        }
        queryFailed($create_comment_query);

        $count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$post_id}";
        $comment_count_query = mysqli_query($connection, $count_query);
        queryFailed($comment_count_query);

    }
}

function getCommentsForPost()
{
    global $connection;
    if (isset($_GET['p_id'])) {
        $get_comment_post_id = $_GET['p_id'];

        $query = "SELECT * FROM comments WHERE comment_post_id LIKE {$get_comment_post_id}";
        $select_comment_by_id = mysqli_query($connection, $query);
        $comment_info = array();

        while ($row = mysqli_fetch_assoc($select_comment_by_id)) {;
            $comment_info[] = $row;
        }

        return $comment_info;
    }
}