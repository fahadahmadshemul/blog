<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<style>
    .actiondel{margin-left:10px;}
    .actiondel a{    border: 1px solid #ddd;color: #444;cursor: pointer;font-size: 18px;padding: 2px 10px;background: #f0f0f0;}
</style>
<?php 
    if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
        echo "<script>window.location = 'index.php'</script>";
        //header("location: index.php");
    }else{
       $pageid = $_GET['pageid'];
    }
?> 
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $name = $_POST['name'];
        $body = $_POST['body'];
        
        $name = mysqli_real_escape_string($db->link, $name);
        $body = mysqli_real_escape_string($db->link, $body); 
        if($name == "" || $body == ""){
            echo "<span style='color:red;font-size:18px;'>Feild must not be empty !.</span>";
        }else{
            $query ="UPDATE tbl_page
                    SET
                    name  = '$name',
                    body = '$body'
                WHERE id='$pageid'";
                $updated_page = $db->update($query);
                if($updated_page){
                    echo "<span style='color:green;font-size:18px'>Page updated successfully</span>";
                }else{
                    echo "<span style='color:red;font-size:18px'>Page not updated</span>";
                }
            }
        }
?>
        <div class="block">   
        <?php
            $query = "SELECT * FROM tbl_page WHERE id='$pageid'";
            $select_page = $db->select($query);
            if($select_page){
                while($result = $select_page->fetch_assoc()){
        ?>            
            <form action="" method="post">
            <table class="form">
                
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body">
                            <?php echo $result['body']; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                        <span class="actiondel">
                            <a onclick="return confirm('Are you sure to Delete?')" href="delpage.php?delid=<?php  echo $result['id']; ?>">Delete</a>
                        </span>
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<?php include "inc/footer.php"; ?>