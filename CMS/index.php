<?php 
include_once 'config/Database.php';
include_once 'class/Articles.php';
$database = new Database();
$db = $database->getConnection();
$article = new Articles($db);
$article->id = 0;
$result = $article->getArticles();
include('inc/header.php');
?>
<title>CMS</title>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<div class="container">	
		<div id="blog" class="row">
			<div class="header">
			<header><a class="logo" style="margin-left:550px;">Information</a>
		<a class="btn btn-blog pull-right" href="admin/index.php" >ADMIN LOGIN</a>
		<a class="btn btn-blog pull-right" href="../Website/Website.html" >HOME PAGE</a>
</header>
		</div><br>
		<br>
		<?php
		while ($post = $result->fetch_assoc()) {
			$date = date_create($post['created']);					
			$message = str_replace("\n\r", "<br><br>", $post['message']);
			$message = $article->formatMessage($message, 0);
			?>
			
			<div class="col-md-4 blogShort">
			<h2><?php echo $post['title']; ?></h2>		
			<!--<em><strong>Category:</strong> <a href="#" target="_blank"></a></em>-->
			<br>
			<article>		
			<p><?php echo $message; ?> 	</p>
			</article>
			
			<a class="btn btn-blog" href="view.php?id=<?php echo $post['id']; ?>">READ MORE</a>
			
			</div>
		<?php } ?>   	
	</div>
	
</div>
<?php include('inc/footer.php');?>
<div class="white pull-right"><a href="https://wipehotwire.com/"><img src="../images/WHITE.png" height="60px" weight="50px"></a></div>