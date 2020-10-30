<?php 
    include "../lib/Session.php";
    Session::checkSession();
?>
<?php include "../config/config.php";?>
<?php include "../lib/Database.php";?>
<?php 
	$db = new Database();
?>
<?php
    if(!isset($_GET['sliderid']) || $_GET['sliderid'] == NULL){
        echo "<script>window.location = 'sliderlist.php'</script>";
        //header("location: postlist.php");
    }else{
        $sliderid = $_GET['sliderid'];
        $getallpost = "select * from tbl_slider where id='$sliderid'";
        $getslider = $db->select($getallpost);
        if($getslider){
            while($delimg = $getslider->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }
        $delquery = "delete from tbl_slider where id='$sliderid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo "<script>alert('Slider Deleted Successfully !.')</script>";
            echo "<script>window.location = 'sliderlist.php'</script>";
        }else{
            echo "<script>alert('Slider Not Deleted Successfully !.')</script>";
            echo "<script>window.location = 'sliderlist.php'</script>";
        }
    }



?>
