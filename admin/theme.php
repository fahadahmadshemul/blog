<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>

    <div class="grid_10">
        <div class="box round first grid">
            <h2>Theme</h2>
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $theme  = $_POST['theme'];
                    
                        $query = "UPDATE tbl_theme
                         SET
                         theme = '$theme'
                          WHERE id = '1'";
                        $updated_row = $db->update($query);
                        if($updated_row){
                            echo "<span style='color:green;font-size:18px;'>Theme Changed Succesfully !.</span>";
                        }else{
                            echo "<span style='color:green;font-size:18px;'>Theme Not changed !.</span>"; 
                        }
                    }
            ?>
            <div class="block copyblock"> 
                <form action="" method="post">
                <table class="form">		
<?php
    $query = "SELECT * FROM tbl_theme WHERE id='1'";
    $theme = $db->select($query);
        while($result = $theme->fetch_assoc()){
?>
                    <tr>
                        <td>
                            <input <?php if($result['theme'] == 'default'){echo "checked";} ?> type="radio" name="theme" value="default">Default
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input <?php if($result['theme'] == 'green'){echo "checked";} ?> type="radio" name="theme" value="green">Green
                        </td>
                    </tr>
                    <?php }  ?>
                    <tr> 
                        <td>
                            <input type="submit" name="submit" Value="Change" />
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
