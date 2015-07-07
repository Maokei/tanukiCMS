<?php
/**
* @author maokei
*/
include_once('includes/connection.php');
include_once('includes/article.php');

$article = new Article;
$articles = $article->fetch_all();

//echo md5('password');

?>
<!DOCTYPE hmtl>
<html>
<head>
    <title>PHP CMS</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/style.css" />
</head>
<body>
    <div class="container">
        <a href="index.php" id="logo">CMS</a>
        <ol>
            <?php foreach ($articles as $article) { ?>
                <li>
                    <a href="article.php?id=<?php echo $article['article_id']; ?>">
                        <?php echo $article['article_title']; ?>
                    </a>
                     - <small>
                         posted <?php echo date('l jS \of F Y', $article['article_timestamp']); ?>
                    </small>
                </li>
            <?php } ?>
        </ol>
        <br/>
        <small><a href="admin">admin</a></small>
    </div>
</body>
</html>
