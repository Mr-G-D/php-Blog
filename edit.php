<?php
    require("../fetchData/config/config.php");
    require("../fetchData/config/db.php");

    #check for submit

    if(isset($_POST["submit"])){
        $update_id = mysqli_real_escape_string($conn, $_POST["update_id"]);
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $body = mysqli_real_escape_string($conn, $_POST["body"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);


        $_query = "UPDATE posts SET
                title = '$title',
                author = '$author',
                body = '$body'
                WHERE id = {$update_id}";

        if(mysqli_query($conn, $_query)){
            header('Location:'.ROOT_URL.'');

        }else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }
    $id = mysqli_real_escape_string($conn,$_GET["id"]);

    $query = "SELECT * FROM posts WHERE id=".$id;

    $results = mysqli_query($conn, $query);

    $post = mysqli_fetch_assoc($results);
    #var_dump($posts);

    mysqli_free_result($results);

    mysqli_close($conn);

?>


<?php include("../fetchData/inc/header.php"); ?>

<div class="container">
    <div class="col">
        <h1>AddPost</h1>

        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="">TITLE</label>
                <input type="text" class="form-control" name="title"
                    value="<?php echo $post['title']; ?>">
            </div>

            <div class="form-group">
                <label for="author">AUTHOR</label>
                <input type="text" class="form-control" name="author"
                    value="<?php echo $post['author']; ?>">
            </div>

            <div class="form-group">
                <label for="">BODY</label>
                <textarea type="text" class="form-control"
                    name="body"><?php echo $post['body']; ?></textarea>
            </div>

            <input type="hidden" name="update_id"
                value="<?php echo $post['id']; ?> ">

            <input type="submit" name="submit" class="btn btn-primary"
                value="submit">
        </form>

    </div>
</div>
<?php include("../fetchData/inc/footer.php"); ?>
