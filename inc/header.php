<?php $filepath = realpath(dirname(__FILE__)); ?>
<?php include $filepath."/../config/config.php";?>
<?php include $filepath."/../lib/Database.php";?>
<?php include $filepath."/../helpers/Format.php";?>
<?php 

	$db = new Database();
	$fm = new Format();

?>
<!DOCTYPE html>
<html>
<head>
<?php include "scripts/meta.php"; ?>
<?php include "scripts/css.php"; ?>
<?php include "scripts/js.php"; ?>
</head>
<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<div class="logo">
			<?php
				$query = "SELECT * FROM title_slogan WHERE id='1'";
				$get_title_slogan = $db->select($query);
				if($get_title_slogan){
					while($result = $get_title_slogan->fetch_assoc()){
			?>
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p><?php echo $result['slogan'];?></p>
				<?php } } ?>
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
			<?php 
				$query = "SELECT * FROM tbl_social WHERE id='1'";
				$selct_social_link = $db->select($query);
				if($selct_social_link){
					while($social_result = $selct_social_link->fetch_assoc()){	
			?>
				<a href="<?php echo $social_result['fb']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $social_result['tw']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $social_result['ln']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $social_result['gp']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php } } ?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
<?php
	$path = $_SERVER['SCRIPT_FILENAME'];
	$currentpage = basename($path, '.php');
?>
	<ul>
		<li><a 
		<?php if($currentpage == 'index'){
			echo 'id="active"';
		} ?>
		href="index.php">Home</a></li>
	<?php
		$query = "SELECT * FROM tbl_page";
		$show_page = $db->select($query);
		if($show_page){
			while($result = $show_page->fetch_assoc()){
	?>
		<li><a
		<?php 
		
		if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){
			echo 'id="active"';
		} ?>
		 href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo  $result['name']; ?></a></li>
<?php } } ?>	
		<li><a 
		<?php if($currentpage == 'contact_us'){
			echo 'id="active"';
		} ?>
		 href="contact_us.php">Contact</a></li>
	</ul>
</div>
