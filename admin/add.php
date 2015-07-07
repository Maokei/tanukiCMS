<?php
/**
* @author maokei
*/
session_start();
include_once('../includes/connection.php');

//check if user is logged in
if(isset($_SESSION['logged_in'])) {
		//form validation
		if(isset($_POST['title'], $_POST['content'])) {
			$title = $_POST['title'];
			//get content and handle line breaks
			$content = nl2br($_POST['content']);

			if(empty($title) or empty($content)) {
				$error = "All field are required!";
			}else{
				//insert data
				$query = $pdo->prepare('INSERT INTO articles (article_title, article_content, article_timestamp) VALUES(?,?,?)');
				$query->bindValue(1, $title);
				$query->bindValue(2, $content);
				$query->bindValue(3, time());
				$query->execute();
				header('Location: index.php');
			}
		}
	?>
		<!DOCTYPE hmtl>
		<html>
		<head>
			<title>PHP CMS</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="../assets/style.css" />
		</head>
		<body>
			<div class="container">
				<a href="index.php" id="logo">CMS</a>

				<h4>Add article</h4>
				<?php if(isset($error)) { ?>
					<br />
                    <small style="color:#aa0000;"><?php echo $error; ?></small>
                    <br />
                <?php } ?>
				<br />
				<form action="add.php" method="post" autocomplete="off">
					<input type="text" name="title" placeholder="title" />
					<br />
					<br />
					<textarea rows="20" cols="60" placeholder="content" name="content"></textarea>
					<br />
					<br />
					<input type="submit" value="Add article" />
				</form>
			</div>
		</body>
		</html>
	<?php
}else{
	header('Location: index.php');
}

?>
