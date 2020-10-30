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
    if(!isset($_GET['delid']) || $_GET['delid'] == NULL){
        echo "<script>window.location = 'index.php'</script>";
        //header("location: index.php");
    }else{
        $delid = $_GET['delid'];
        $delquery = "delete from tbl_page where id='$delid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo "<script>alert('Page Deleted Successfully !.')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{
            echo "<script>alert('Page Not Deleted !.')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
    }



?>
