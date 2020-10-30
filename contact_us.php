<?php
include "inc/header.php";
?>
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$firstname = trim(stripslashes(htmlspecialchars($_POST['firstname'])));
		$lastname = trim(stripslashes(htmlspecialchars($_POST['lastname'])));
		$email = trim(stripslashes(htmlspecialchars($_POST['email'])));
		$body = trim(stripslashes(htmlspecialchars($_POST['body'])));

		$firstname = mysqli_real_escape_string($db->link, $firstname);
		$lastname = mysqli_real_escape_string($db->link, $lastname);
		$email = mysqli_real_escape_string($db->link, $email);
		$body = mysqli_real_escape_string($db->link, $body);

		$errorf = "";
		$errorl = "";
		$errore = "";
		$errorb = "";

		if(empty($firstname)){
			$errorf = "First name feild must not be empty !.";
		}
		if(empty($lastname)){
			$errorl = "Last name feild must not be empty !.";
		}
		if(empty($email)){
			$errore = "Email feild must not be empty !.";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errore = "Invalid Email Format !.";
		}
		if(empty($body)){
			$errorb = "Message feild must not be empty !.";
		}


		/*if(empty($firstname)){
			$error = "First name feild must not be empty !.";
		}elseif(empty($lastname)){
			$error = "Last name feild must not be empty !.";
		}elseif(empty($email)){
			$error = "Email feild must not be empty !.";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid Email Address !.";
		}elseif(empty($body)){
			$error = "Message feild must not be empty !.";
		}
		*/
		else{
			$query = "INSERT INTO tbl_contact(firstname, lastname, email, body) VALUES ('$firstname', '$lastname', '$email', '$body')";
			$insert_row = $db->insert($query);
			if($insert_row){
				$msg = "Message Sent Successfully !.";
			}else{
				$error = "Message Not Sent !.";
			}
		}

	}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
					if(isset($error)){
						echo "<span style='color:red;'>$error</span>";
					}
					if(isset($msg)){
						echo "<span style='color:green;'>$msg</span>";
					}
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<?php if(isset($errorf)){
						echo "<span style='color:red;float:left'>$errorf</span>";
					} ?>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<?php if(isset($errorl)){
						echo "<span style='color:red;float:left'>$errorl</span>";
					} ?>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<?php if(isset($errore)){
						echo "<span style='color:red;float:left'>$errore</span>";
					} ?>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<?php if(isset($errorb)){
						echo "<span style='color:red;float:left'>$errorb</span>";
					} ?>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
</div>
<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>