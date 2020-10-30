












</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
	  <p>&copy; Copyright <?php echo date("Y"); ?> Fahad Ahmad Shemul.</p>
	</div>
	<div class="fixedicon clear">
	<?php
		$query = "SELECT * FROM tbl_social WHERE id='1'";
		$select_social = $db->select($query);
		if($select_social){
			while($socila_result = $select_social->fetch_assoc()){	
	?>
		<a href="<?php echo $socila_result['fb']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $socila_result['tw']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $socila_result['ln']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $socila_result['gp']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
	<?php } } ?>
	</div>
	<script id="dsq-count-scr" src="//fahad-me.disqus.com/count.js" async></script>
<script type="text/javascript" src="js/scrolltop.js"></script>
</body>
</html>