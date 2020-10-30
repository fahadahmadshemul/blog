<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<?php
	if(isset($_GET['delcat'])){
		$id = $_GET['delcat'];
		$query = "DELETE FROM tbl_category WHERE id=$id";
		$delcategory = $db->delete($query);
		if($delcategory){
			echo "<span style='color:green;font-size:18px;'>Category  Deleted succesfully !.</span>";
		}else{
			echo "<span style='color:green;font-size:18px;'>Category Not Deleted !.</span>";
		}
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$query = "SELECT * FROM tbl_category ORDER BY id DESC";
		$category = $db->select($query);
		if($category){
			$i=0;
			while($result = $category->fetch_assoc()){
			$i++;
	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']; ?></td>
							<td>
							<a href="editcat.php?catid=<?php echo $result['id'];?>">Edit</a>
					<?php if(Session::get('userRole') == '0'){ ?>
							|| <a onclick="return confirm('Are you sure to Delete?')" href="?delcat=<?php echo $result['id'];?>">Delete</a>
					<?php } ?>
							</td>
						</tr>

			<?php } } ?>	
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">

$(document).ready(function () {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();


});
</script>
<?php include "inc/footer.php"; ?>
