<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New Category</h2>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name  = $_POST['name'];
                    if(empty($name)){
                        echo "<span style='color:red;font-size:18px;'>Feild must not be empty !.</span>";
                    }else{
                        $query = "INSERT INTO tbl_category (name) VALUES('$name')";
                        $addcat = $db->insert($query);
                        if($addcat){
                            echo "<span style='color:green;font-size:18px;'>Add category Succesfully !.</span>";
                        }
                    }
                    
                }
            ?>
            <div class="block copyblock"> 
                <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
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
