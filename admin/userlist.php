<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>User List</h2>
                <?php
	if(isset($_GET['deluser'])){
		$id = $_GET['deluser'];
		$query = "DELETE FROM tbl_user WHERE id=$id";
		$delcategory = $db->delete($query);
		if($delcategory){
			echo "<span style='color:green;font-size:18px;'>User  Deleted succesfully !.</span>";
		}else{
			echo "<span style='color:green;font-size:18px;'>User Not Deleted !.</span>";
		}
    }
?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Details</th>
                            <th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
	<?php
		$query = "SELECT * FROM tbl_user ORDER BY id DESC";
		$alluser = $db->select($query);
		if($alluser){
			$i=0;
			while($result = $alluser->fetch_assoc()){
			$i++;
	?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']; ?></td>
                            <td><?php echo $result['username']; ?></td>
                            <td><?php echo $result['email']; ?></td>
                            <td><?php echo $fm->textShorten($result['details'], 20); ?></td>
                            <td>
                    <?php
                        if($result['role'] == '0'){
                            echo "Admin";
                        }elseif($result['role'] == '1'){
                            echo "Author";
                        }elseif($result['role'] == '2'){
                            echo "Editor";
                        }
                    ?>
                            </td>

							<td><a href="viewuser.php?catid=<?php echo $result['id'];?>">View</a> 
						<?php if(Session::get('userRole') =='0'){ ?>
							|| <a onclick="return confirm('Are you sure to Delete?')" href="?deluser=<?php echo $result['id'];?>">Delete</a>
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
