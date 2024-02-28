<?php
include_once "../includes/db.php";



function get_adm_header() {
    include "includes/adm_header.php";
}

function get_adm_navigation() {
    include "includes/adm_navigation.php"; 
}

function get_adm_footer() {
    include "includes/adm_footer.php";
}


function insert_categories() {

    global $connection;

    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "This feld should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
            $create_category_query = mysqli_query($connection, $query);

            if (!$create_category_query) {

                die("QUERY FAILED" . mysqli_error($connection));
            }

            header("Location: categories.php");
        }
    }
}


function delete_category() {

    global $connection;

    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_category_query = mysqli_query($connection, $query);

        if (!$delete_category_query) {

            die("QUERY FAILED" . mysqli_error($connection));
        }

        header("Location: categories.php");
    }
}

?>