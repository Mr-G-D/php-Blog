<?php
    require("../fetchData/config/config.php");
    require("../fetchData/config/db.php");

    $query = "SELECT * FROM posts ORDER BY created_at DESC";

    $results = mysqli_query($conn, $query);

    $posts = mysqli_fetch_all($results,MYSQLI_ASSOC);
    #var_dump($posts);

    mysqli_free_result($results);

    mysqli_close($conn);
?>


<?php include("../fetchData/inc/header.php"); ?>

<div class="container">
    <div class="col">
        <h1>Posts</h1>
        <?php foreach ($posts as $post) : ?>
        <div class="well ">
            <h3>
                <?php echo $post["title"];?>
            </h3>
            <small>Created on <?php echo $post["created_at"]; ?> by
                <?php echo $post["author"]; ?></small>
            <p><?php echo $post["body"]; ?></p>
            <a href="<?php echo ROOT_URL; ?>/post.php?id=<?php echo $post['id']; ?>"
                class="btn btn-primary">Read More</a>
            <br>
            <br>
        </div>
        <?php endforeach;?>
    </div>
</div>
<?php include("../fetchData/inc/footer.php"); ?>
