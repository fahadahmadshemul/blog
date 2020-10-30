<?php include "inc/header.php";?>
<?php include "inc/sidebar.php"; ?>
<?php
    if(!Session::get('userRole') == '0'){
        echo "<script>window.location = 'index.php'</script>";
    }
?>
    <div class="grid_10">
        <div class="box round first grid">
            <h2>Add New User</h2>
            <div class="block copyblock"> 
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $username  = trim(htmlspecialchars(stripslashes($_POST['username'])));
                    $password  = trim(htmlspecialchars(stripslashes(md5($_POST['password']))));
                    $email  = trim(htmlspecialchars(stripslashes($_POST['email'])));
                    $role  = trim(htmlspecialchars(stripslashes($_POST['role'])));

                    if(empty($username) || empty($password) || empty($email) || empty($role)){
                        echo "<span style='color:red;font-size:18px;'>Feild must not be empty !.</span>";
                    }else{
                        $mailquery = "SELECT * FROM tbl_user WHERE email='$email' LIMIT 1";
                        $mailcheck = $db->select($mailquery);
                        if($mailcheck != false){
                            echo "<span style='color:red;font-size:18px;'>Email already exist!.</span>";
                        }else{
                            $query = "INSERT INTO tbl_user (username, password, email, role) VALUES('$username', '$password', '$email', '$role')";
                            $addcat = $db->insert($query);
                            if($addcat){
                                echo "<span style='color:green;font-size:18px;'>Create User Succesfully !.</span>";
                            }else{
                                echo "<span style='color:green;font-size:18px;'>User not Created !.</span>";
                            }
                        }
                    }
                }
            ?>
                <form action="" method="post">
                <table class="form">					
                    <tr>
                        <td>
                            <label for="">Username : </label>
                        </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter User Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Password : </label>
                        </td>
                        <td>
                            <input type="text" name="password" placeholder="Enter Password..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">Email : </label>
                        </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Valid Email Address..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="">User Role : </label>
                        </td>
                        <td>
                            <select name="role" id="select">
                                <option value="">Select User Role</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr> 
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Create" />
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
