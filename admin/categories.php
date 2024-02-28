<?php
include_once "includes/functions.php";

get_adm_header();
?>

<div id="wrapper">

    <?php get_adm_navigation(); ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_categories(); ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>


                        <?php
                        // Update and include
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        } ?>


                    </div>

                    <div class="col-xs-6">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // Find all categories query
                                $query = "SELECT * FROM categories";
                                $select_categories = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($select_categories)) :
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                ?>
                                    <tr>
                                        <td><?php echo $cat_id; ?></td>
                                        <td><?php echo $cat_title; ?></td>
                                        <td><a href="categories.php?edit=<?php echo $cat_id; ?>">Edit</a></td>
                                        <td><a href="categories.php?delete=<?php echo $cat_id; ?>">Delete</a></td>
                                    </tr>
                                    
                                <?php
                                    delete_category();

                                endwhile;
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


<?php get_adm_footer(); ?>