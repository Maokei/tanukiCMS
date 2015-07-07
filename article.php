<?php
/**
* @author maokei
*/
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article();

//has user specified an id
if(isset($_GET['id'])) {
    //get article
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
    ?>

        <html>
        <head>
            <title>PHP CMS</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="assets/style.css" />
        </head>
        <body>
            <div class="container">
                <a href="index.php" id="logo">CMS</a>
                <h4>
                    <?php echo $data['article_title']; ?> -
                </h4>
                <small>
                    posted <?php echo date('l jS \of F Y', $data['article_timestamp']);?>
                </small>
                <p>
                    <?php echo $data['article_content']?>
                </p>

                <a href="index.php">&larr; Back</a>
            </div>
        </body>
        </html>
    <?php
}else{
    header('Location: index.php');
    exit();
}
?>
