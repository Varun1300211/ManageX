<?php 
include_once 'config/Database.php';
include_once 'class/Articles.php';
$database = new Database();
$db = $database->getConnection();
$article = new Articles($db);
$article->id = (isset($_GET['id']) && $_GET['id']) ? $_GET['id'] : '0';
$result = $article->getArticles();
include('inc/header.php');
?>
<title>CMS</title>
<link href="css/style.css" rel="stylesheet" id="bootstrap-css">
<div class="container">		
	<div id="blog" class="row">     
		<div id="blog" class="row">
			<div class="header">
			<a href="#default" class="logo">Information</a>
		</div>		
		<?php 
		while ($post = $result->fetch_assoc()) {
			$date = date_create($post['created']);
			$message = str_replace("\n\r", "<br><br>", $post['message']);
		?>
			<div class="col-md-10 blogShort">
			<h2><?php echo $post['title']; ?></h2>
			<em><strong>Category:</strong> <a href="#" target="_blank"><?php echo $post['category']; ?></a></em>
			<br><br>
			<article>
				<h4><?php echo $message; ?></h4> 	
			</article>		
			</div>
		<?php } ?>   
		<div class="col-md-12 gap10"></div>	
	</div>
	<br><br>
	<a class="btn btn-blog" onclick="window.print();return false;" />DOWNLOAD AS PDF</a>
</div>
<?php include('inc/footer.php');?>