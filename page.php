<?php
include "inc/header.php";
?>

<?php 
	if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
		echo "<script>window.location = 'index.php'</script>";
		//header("location: index.php");
	}else{
		$pageid = $_GET['pageid'];
	}
?>


<div class="contentsection contemplete clear">
			<?php
				$query = "SELECT * FROM tbl_page WHERE id='$pageid'";
				$select_page = $db->select($query);
				if($select_page){
					while($result = $select_page->fetch_assoc()){
			?>
	<div class="maincontent clear">
			<div class="about">
				<h2><?php echo $result['name']; ?></h2>

				<?php echo $result['body']; ?>
	</div>
	<?php } } ?>
</div>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>