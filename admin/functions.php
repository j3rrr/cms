<?php

function queryFailed($var)
{
    global $connection;
    if (!$var) {
        die('QUERY FAILED' . mysqli_error($connection));
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
        <td>{$post_tag}</td>
        <td>{$post_category_id}</td>
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
    header("Location: posts.php?source=edit_post&p_id=$post_id");

    queryFailed($edit_post);
}