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
    if(!isset($_GET['deltid']) || $_GET['deltid'] == NULL){
        echo "<script>window.location = 'postlist.php'</script>";
        //header("location: postlist.php");
    }else{
        $postid = $_GET['deltid'];
        $getallpost = "select * from tbl_post where id='$postid'";
        $getdata = $db->select($getallpost);
        if($getdata){
            while($delimg = $getdata->fetch_assoc()){
                $dellink = $delimg['image'];
                unlink($dellink);
            }
        }
        $delquery = "delete from tbl_post where id='$postid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo "<script>alert('Data Deleted Successfully !.')</script>";
            echo "<script>window.location = 'postlist.php'</script>";
        }else{
            echo "<script>alert('Data Not Deleted Successfully !.')</script>";
            echo "<script>window.location = 'postlist.php'</script>";
        }
    }



?>
