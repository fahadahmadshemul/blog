<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<?php 
    if(!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
        echo "<script>window.location = 'inbox.php'</script>";
        //header("location: postlist.php");
    }else{
        $id = $_GET['msgid'];
    }
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update  Post</h2>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script>window.location = 'inbox.php'</script>";
    }
?>
        <div class="block">   
            <form action="" method="post">
            <?php
            $query = "SELECT * FROM tbl_contact WHERE id='$id'";
            $viewmsg = $db->select($query);
            if($viewmsg){
                while($viewresult = $viewmsg->fetch_assoc()){
        ?> 
            <table class="form">
                
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" readonly  value="<?php echo $viewresult['firstname'].' '.$viewresult['lastname']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text" readonly  value="<?php echo $viewresult['email']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date</label>
                    </td>
                    <td>
                        <input type="text" readonly  value="<?php echo $fm->formatDate($viewresult['date']); ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea readonly class="tinymce" name="body">
                        <?php echo $viewresult['body']; ?>"
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="OK" />
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


