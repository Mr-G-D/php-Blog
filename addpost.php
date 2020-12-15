<?php
    require("../fetchData/config/config.php");
    require("../fetchData/config/db.php");

    #check for submit

    if(isset($_POST["submit"])){
        
        $title = mysqli_real_escape_string($conn, $_POST["title"]);
        $body = mysqli_real_escape_string($conn, $_POST["body"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);


        $_query = "INSERT INTO posts (title, author, body) VALUES ('$title', '$author','$body')";

        if(mysqli_query($conn, $_query)){
            header('Location:'.ROOT_URL.'');

        }else {
            echo 'ERROR: '. mysqli_error($conn);
        }
    }

?>


<?php include("../fetchData/inc/header.php"); ?>

<div class="container">
    <div class="col">
        <h1>AddPost</h1>

        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="">TITLE</label>
                <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
                <label for="">AUTHOR</label>
                <input type="text" class="form-control" name="author">
            </div>

            <div class="form-group">
                <label for="">BODY</label>
                <textarea type="text" class="form-control"
                    name="body"></textarea>
            </div>

            <input type="hidden" name="update_id"
                value="<?php echo $post['id']; ?> ">

            <input type="submit" name="submit" class="btn btn-primary"
                value="submit">
        </form>

    </div>
</div>
<?php include("../fetchData/inc/footer.php"); ?>
