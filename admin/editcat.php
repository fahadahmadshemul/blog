<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<?php 
    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script>window.location = 'catlist.php'</script>";
        //header("location: catlist.php");
    }else{
        $id = $_GET['catid'];
    }
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Edit Catagoru</h2>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name  = $_POST['name'];
                    if(empty($name)){
                        echo "<span style='color:red;font-size:18px;'>Feild must not be empty !.</span>";
                    }else{
                        $query = "UPDATE tbl_category
                         SET
                          name = '$name'
                          WHERE id = '$id'";
                        $updated_row = $db->update($query);
                        if($updated_row){
                            echo "<span style='color:green;font-size:18px;'>Updated category Succesfully !.</span>";
                        }else{
                            echo "<span style='color:green;font-size:18px;'>Category Not Updated !.</span>"; 
                        }
                    }
                    
                }
            ?>
            <div class="block copyblock"> 
                <form action="" method="post">
                <table class="form">		
<?php
    $query = "SELECT * FROM tbl_category WHERE id=$id ORDER by id DESC";
    $category = $db->select($query);
    if($category){
        $i=0;
        while($result = $category->fetch_assoc()){
        $i++;
?>
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Enter Category Name..." class="medium" value="<?php echo $result['name'];?>" />
                        </td>
                    </tr>
                    <?php } } ?>
                    <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
</div>
<?php include "inc/footer.php"; ?>
