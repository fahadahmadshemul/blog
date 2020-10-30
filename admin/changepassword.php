<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $id = Session::get('userId');

        $oldPass = trim(htmlspecialchars(stripslashes($oldPass)));
        $newPass = trim(htmlspecialchars(stripslashes($newPass)));

        $oldPass = mysqli_real_escape_string($db->link, $oldPass);
        $newPass = mysqli_real_escape_string($db->link, $newPass);

        if(empty($oldPass) || empty($newPass)){
            echo "<span style='color:red;font-size:18px'>Feild must not be empty.!</span>";
        }else{
            $query = "SELECT * FROM tbl_user WHERE password=md5('$oldPass') AND id='$id' ";
            $chk = $db->select($query);

            if($chk != false){
                $query = "UPDATE tbl_user SET password = md5('$newPass') WHERE id='$id'";
                $result = $db->update($query);
                if($result){
                    echo "<span style='color:green;font-size:18px'>Changed password successfully.!</span>";
                }else{
                    echo "<span style='color:red;font-size:18px'>Password not changed.!</span>";
                }
            }else{
                echo "<span style='color:red;font-size:18px'>Old password not match.!</span>";
            }
        }


    }
?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Change Password</h2>
        <div class="block">               
            <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldPass" class="medium" />
                    </td>
                </tr>
                    <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newPass" class="medium" />
                    </td>
                </tr>
                    
                
                    <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>
