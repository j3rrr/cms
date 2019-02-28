<?php

function queryFailed($var)
{
    global $connection;
    if (!$var) {
        die('QUERY FAILED' . mysqli_error($connection));
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

/**
 * CATEGORY Functions
 */
function insertCategoryQuery()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $new_cat_title = $_POST['cat_title'];
        if ($new_cat_title == "" || empty($new_cat_title)) {
            echo "<div class='alert alert-danger'>Please enter a title.</div>";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$new_cat_title}') ";

            $create_category_query = mysqli_query($connection, $query);
            echo "<div class='alert alert-success'>Successfully added Category {$new_cat_title}</div>";

            if (!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function showAllCategories()
{
    global $connection;
    // $query = "SELECT * FROM categories LIMIT 3 ";
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";

        echo "</tr>";
    }
}

function deleteCategoryQuery()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $get_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id LIKE {$get_cat_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }

}

/**
 * POST Functions
 */
function showAllPosts()
{
    global $connection;
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_posts)) {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tag = $row['post_tag'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

        if ($post_status == "published") {
            $status_class = "label-success";
        } else {
            $status_class = "label-warning";
        }

        echo "<tr>
        <td>{$post_id}</td>
        <td>{$post_title}</td>
        <td>{$post_author}</td>
        <td>{$post_date}</td>
        <td>{$post_tag}</td>";

        $query_cat = "SELECT * FROM categories WHERE cat_id LIKE {$post_category_id}";
        $select_categories = mysqli_query($connection, $query_cat);

        while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }

        queryFailed($select_categories);

        echo "
        <td>{$cat_title}</td>
        <td>{$post_comment_count}</td>
        <td><img width='100px' src='../img/{$post_image}'></td>
        <td class='text-center'><span  class='label {$status_class}'>{$post_status}</span></td>
        <td><a href='posts.php?source=edit_post&p_id={$post_id}'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td>
        <td><a href='posts.php?delete={$post_id}'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>
        </tr>";
    }
}

function addPost()
{
    global $connection;

    if (isset($_POST['add_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        $post_tag = $_POST['post_tag'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        $post_comment_count = 4;

        move_uploaded_file($post_image_temp, "../img/$post_image");

        $query = "INSERT INTO posts(post_title,post_category_id,post_author,post_status,post_image,post_tag,post_content,post_date,post_comment_count) ";
        $query .= "VALUES('{$post_title}',{$post_category_id},'{$post_author}','{$post_status}','{$post_image}','{$post_tag}','{$post_content}',now(),{$post_comment_count}) ";

        $add_post_query = mysqli_query($connection, $query);
        if ($add_post_query) {
            echo "<div class='alert alert-success'>Successfully added Post</div>";
        }
        queryFailed($add_post_query);

    }
}

function deletePost()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $del_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id LIKE {$del_post_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");

    }
}

function getPostData()
{
    global $connection;
    if (isset($_GET['p_id'])) {
        $edit_post_id = $_GET['p_id'];

        $query = "SELECT * FROM posts WHERE post_id LIKE {$edit_post_id}";
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

function submitEditPost()
{
    global $connection;
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_tag = $_POST['post_tag'];
    $post_status = $_POST['post_status'];
    $post_id = $_GET['p_id'];

    move_uploaded_file($post_image_temp, "../img/$post_image");

    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id LIKE $post_id ";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_category_id  = '{$post_category_id}', ";
    $query .= "post_title  = '{$post_title}', ";
    $query .= "post_author  = '{$post_author}', ";
    $query .= "post_image  = '{$post_image}', ";
    $query .= "post_content  = '{$post_content}', ";
    $query .= "post_tag  = '{$post_tag}', ";
    $query .= "post_status  = '{$post_status}', ";
    $query .= "post_date  = now() ";
    $query .= "WHERE post_id = {$post_id} ";

    $edit_post = mysqli_query($connection, $query);
    header("Location: posts.php?source=edit_post&p_id=$post_id&update=s");

    queryFailed($edit_post);
}

/**
 * COMMENT Functions
 */
function showAllComments()
{
    global $connection;
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_comments)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_date = $row['comment_date'];
        $comment_email = $row['comment_email'];
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];

        if ($comment_status == "approved") {
            $status_class = "label-success";
        } else {
            $status_class = "label-warning";
        }

        echo "<tr>
            <td>{$comment_id}</td>";

        $query_post = "SELECT * FROM posts WHERE post_id LIKE {$comment_post_id}";
        $select_post = mysqli_query($connection, $query_post);

        while ($row = mysqli_fetch_assoc($select_post)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
        }
        queryFailed($select_post);

        echo "
            <td><a href='posts.php?source=edit_post&p_id={$post_id}'><i class='fa fa-edit' aria-hidden='true'></i></a> <a href='../post.php?p_id={$post_id}'>";
        excerpt($post_title, 15);
        echo "</a></td>
            <td>";
        excerpt($comment_content, 15);
        echo "</td>
            <td>{$comment_author}</td>
            <td>{$comment_email}</td>
            <td>{$comment_date}</td>
            <td class='text-center'><span class='label {$status_class}'>{$comment_status}</span></td>
            <td class='text-center'><a href='comments.php?c_id={$comment_id}&c_status=appr'><i class='fa fa-check' aria-hidden='true'></i></a></td>
            <td class='text-center'><a href='comments.php?c_id={$comment_id}&c_status=unappr'><i class='fa fa-ban' aria-hidden='true'></i></a></td>
            <td class='text-center'><a href='comments.php?source=edit_comment&c_id={$comment_id}'><i class='fa fa-edit' aria-hidden='true'></i></a></td>
            <td class='text-center'><a href='comments.php?delete={$comment_id}&p_id={$comment_post_id}'><i class='fa fa-trash' aria-hidden='true'></i></a></td>
            </tr>";

    }
}

function addComment()
{
    global $connection;

    if (isset($_POST['add_comment'])) {
        $comment_post_id = $_POST['comment_post_id'];
        $comment_author = $_POST['comment_author'];
        $comment_date = date('d-m-y');
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $comment_status = $_POST['comment_status'];

        $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
        $query .= "VALUES({$comment_post_id},'{$comment_author}','{$comment_email}','{$comment_content}','{$comment_status}',now()) ";

        $add_comment_query = mysqli_query($connection, $query);
        if ($add_comment_query) {
            echo "<div class='alert alert-success'>Successfully added Comment</div>";
        }
        queryFailed($add_comment_query);

        $count_query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = {$comment_post_id}";
        $comment_count_query = mysqli_query($connection, $count_query);
        queryFailed($comment_count_query);

    }
}

function deleteComment()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $del_comment_id = $_GET['delete'];
        $comment_post_id = $_GET['p_id'];
        $query = "DELETE FROM comments WHERE comment_id LIKE {$del_comment_id}";
        $delete_query = mysqli_query($connection, $query);

        $count_query = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = {$comment_post_id}";
        $comment_count_query = mysqli_query($connection, $count_query);
        queryFailed($comment_count_query);

        header("Location: comments.php");

    }
}

function updateCommentStatus()
{
    global $connection;

    if (isset($_GET['c_status'])) {
        $comment_id = $_GET['c_id'];
        if ($_GET['c_status'] == "appr") {
            $get_new_status = "approved";
        } elseif ($_GET['c_status'] == "unappr") {
            $get_new_status = "unapproved";
        }
        $query = "UPDATE comments SET comment_status = '{$get_new_status}' WHERE comment_id = {$comment_id}";
        $update_query = mysqli_query($connection, $query);
        queryFailed($update_query);
        header("Location: comments.php");

    }

}

function getCommentData()
{
    global $connection;
    if (isset($_GET['c_id'])) {
        $edit_comment_id = $_GET['c_id'];

        $query = "SELECT * FROM comments WHERE comment_id LIKE {$edit_comment_id}";
        $select_comment_by_id = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($select_comment_by_id);
        $comment_info = array(
            'comment_id' => $row['comment_id'],
            'comment_author' => $row['comment_author'],
            'comment_email' => $row['comment_email'],
            'comment_post_id' => $row['comment_post_id'],
            'comment_date' => $row['comment_date'],
            'comment_status' => $row['comment_status'],
            'comment_content' => $row['comment_content'],
        );

        return $comment_info;
    }
}

function submitEditComment()
{
    global $connection;
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_post_id = $_POST['comment_post_id'];
    $comment_status = $_POST['comment_status'];
    $comment_content = $_POST['comment_content'];
    $comment_id = $_GET['c_id'];

    $query = "UPDATE comments SET ";
    $query .= "comment_author  = '{$comment_author}', ";
    $query .= "comment_email  = '{$comment_email}', ";
    $query .= "comment_post_id  = '{$comment_post_id}', ";
    $query .= "comment_status  = '{$comment_status}', ";
    $query .= "comment_content  = '{$comment_content}', ";
    $query .= "comment_date  = now() ";
    $query .= "WHERE comment_id = {$comment_id} ";

    $edit_comment = mysqli_query($connection, $query);
    header("Location: comments.php?source=edit_comment&c_id=$comment_id&update=s");
    if (!$edit_comment) {
        echo $query;
    }

    queryFailed($edit_comment);
}