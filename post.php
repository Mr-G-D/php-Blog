<?php
    require("../fetchData/config/config.php");
    require("../fetchData/config/db.php");

    if(isset($_POST["delete"])){
        $delete_id = mysqli_real_escape_string($conn, $_POST["delete_id"]);
        


        $query = "DELETE FROM posts WHERE id = {$delete_id}";

        if(mysqli_query($conn, $query)){
            header('Location:'.ROOT_URL.'');

        }else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

    $id = mysqli_real_escape_string($conn,$_GET['id']);

    $query = "SELECT * FROM posts WHERE id=".$id;

    $results = mysqli_query($conn, $query);

    $post = mysqli_fetch_assoc($results);
    #var_dump($posts);

    mysqli_free_result($results);

    mysqli_close($conn);
?>


<?php include("inc/header.php"); ?>

<div class="container">
    <h1>
        <?php echo $post["title"];?>
    </h1>
    <small>Created on <?php echo $post["created_at"]; ?> by
        <?php echo $post["author"]; ?></small>
    <p><?php echo $post["body"]; ?></p>


    <a href="<?php echo ROOT_URL; ?>" class="btn btn-primary">Back</a>

    <form class="pull-right"
        action="<?php echo $_SERVER['PHP_SELF']; ?>"
        class="pull-right" method="POST">
        <input type="hidden" name="delete_id"
            value="<?php echo $post['id']; ?>">
        <input type="submit" name="delete" value="DELETE"
            class="btn btn-danger">
    </form>


    <a href="<?php echo ROOT_URL; ?> ../../edit.php?id=<?php echo $post["id"]; ?>"
        class="btn btn-primary">EDIT</a>


</div>

<?php include("inc/footer.php"); ?>
