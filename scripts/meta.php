<?php 
	if(isset($_GET['pageid'])){
		$pagetitle = $_GET['pageid'];
		$query = "SELECT * FROM tbl_page WHERE id='$pagetitle'";
		$show_page = $db->select($query);
		if($show_page){
			while($result = $show_page->fetch_assoc()){ ?>

			<title><?php echo $result['name']; ?> - <?php echo TITLE ?></title>

		<?php } } }elseif(isset($_GET['id'])){
		$postid = $_GET['id'];
		$query = "SELECT * FROM tbl_post WHERE id='$postid'";
		$posts = $db->select($query);
		if($posts){
			while($result = $posts->fetch_assoc()){ ?>

			<title><?php echo $result['title']; ?> - <?php echo TITLE ?></title>

		<?php } } }else{?>
			<title><?php echo $fm->title(); ?> - <?php echo TITLE ?></title>
		<?php } ?>
			<meta name="language" content="English">
				<meta name="description" content="It is a website">
		<?php
		if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM tbl_post WHERE id='$id'";
		$select_tags = $db->select($query);
		if($select_tags){
			while($metaselect = $select_tags->fetch_assoc()){?>
			<meta name="keywords" content="<?php echo $metaselect['tags']; ?>">
		<?php } } }else{?>	
			<meta name="keywords" content="<?php echo KEYWORDS; ?>">
		<?php } ?>
			<meta name="author" content="Delowar">