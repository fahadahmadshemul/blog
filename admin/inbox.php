<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
<?php 
    if(isset($_GET['seenid'])){
        $seenid = $_GET['seenid'];
        $query ="UPDATE tbl_contact
                        SET
                        status = '1'
                WHERE id='$seenid'";
        $updated_row = $db->update($query);
        if($updated_row){
            echo "<span style='color:green;font-size:18px'>Message sent in the seen box.!</span>";
        }else{
            echo "<span style='color:green;font-size:18px'>Something went wrong..!</span>";
        }
    }
?>
        <div class="block">        
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
                $select_msg = $db->select($query);
                if($select_msg){
                    $i=0;
                    while($result = $select_msg->fetch_assoc()){
                        $i++;
            ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $fm->textShorten($result['body'], 50); ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                    <td>
                    <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || 
                    <a href="replaymsg.php?msgid=<?php echo $result['id']; ?>">Reply</a> ||
                    <a onclick="return confirm('Are you sure to move this message..!')" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
                    </td>
                </tr>
                <?php } } ?>
            </tbody>
        </table>
        </div>
    </div>
    <div class="box round first grid">
        <h2>Seen Message</h2>
        <?php
            if(isset($_GET['delid'])){
                $delid = $_GET['delid'];
                $query = "DELETE FROM tbl_contact WHERE id='$delid'";
            $delete_msg = $db->delete($query);
            if($delete_msg){
                echo "<span style='color:green;font-size:18px;'>Message deleted successfully !.</span>";
            }else{
                echo "<span style='color:green;font-size:18px;'>Message Not deleted !.</span>";
            }
            }
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
            <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
                $select_msg = $db->select($query);
                if($select_msg){
                    $i=0;
                    while($result = $select_msg->fetch_assoc()){
                        $i++;
            ?>
                <tr class="odd gradeX">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['firstname'].' '.$result['lastname']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $fm->textShorten($result['body'], 100); ?></td>
                    <td><?php echo $fm->formatDate($result['date']); ?></td>
                    <td>
                    <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
                    <a onclick="return confirm('Are you sure to Delete this message..!')" href="?delid=<?php echo $result['id']; ?>">Delete</a>
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