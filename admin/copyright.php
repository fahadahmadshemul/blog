<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Update Copyright Text</h2>
        
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $note  = $_POST['note'];
        if(empty($note)){
            echo "<span style='color:red;font-size:18px;'>Feild must not be empty !.</span>";
        }else{
            $query = "UPDATE tbl_footer
             SET
              note = '$note'
              WHERE id = '1'";
            $updated_row = $db->update($query);
            if($updated_row){
                echo "<span style='color:green;font-size:18px;'>Updated Data Succesfully !.</span>";
            }else{
                echo "<span style='color:green;font-size:18px;'>Data Not Updated !.</span>"; 
            }
        }
        
    }
?>
        <div class="block copyblock"> 
        <?php
                $query = "SELECT * FROM tbl_footer WHERE id='1'";
                $select_cprt = $db->select($query);
                if($select_cprt){
                    while($cprt_result = $select_cprt->fetch_assoc()){ 
            ?>
            <form action="" method="POST">
            <table class="form">				
                <tr>
                    <td>
                        <input type="text" name="note" value="<?php echo $cprt_result['note']; ?>"  class="large" />
                    </td>
                </tr>
                
                    <tr> 
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>