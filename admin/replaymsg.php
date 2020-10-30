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
        <h2>Reply Message</h2>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $to = trim(htmlspecialchars(stripslashes($_POST['toEmail'])));
        $form = trim(htmlspecialchars(stripslashes($_POST['formEmail'])));
        $subject = trim(htmlspecialchars(stripslashes($_POST['subject'])));
        $message = trim(htmlspecialchars(stripslashes($_POST['message'])));

        $sendmail = mail($to , $subject, $message, $form);
        if($sendmail){
            echo "<span style='color:red;font-size:18px'>Send Mail Successfully..!!</span>";
        }else{
            echo "<span style='color:red;font-size:18px'>Something went wrong..!!</span>";
        }
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
                        <label>To</label>
                    </td>
                    <td>
                        <input type="text" readonly name="toEmail"  value="<?php echo $viewresult['email']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>From</label>
                    </td>
                    <td>
                        <input type="text" name="formEmail" placeholder="Please Enter your email" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Subject</label>
                    </td>
                    <td>
                        <input type="text" name="subject" placeholder="please enter subject" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Message</label>
                    </td>
                    <td>
                        <textarea  class="tinymce" name="message">
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


