<?php
	//header & open database
	require_once "header.php";
	
	//New user Registration Form
	echo('<p>Register Details</p>
			<div  class="form">
				<form method="post">
					<p>Username:</p>
						<input class="textinput" type="text" name="Username" maxlength="20" required>
					<br><br>
					<p>Password:</p>
						<input class="textinput" type="password" name="Password" maxlength="6" pattern=".{6,6}"   required title="Password must be 6 characters">
					<br><br>
					<p>First Name:</p>
						<input class="textinput" type="text" name="FirstName" maxlength="20" required>
					<br><br>
					<p>Surname:</p>
						<input class="textinput" type="text" name="Surname" maxlength="20" required>
					<br><br>
					<p>Street:</p>
						<input class="textinput" type="text" name="AddressLine1" maxlength="50" required>
					<br><br>
					<p>Town:</p>
						<input class="textinput" type="text" name="AddressLine2" maxlength="50" required>
					<br><br>
					<p>City:</p>
						<input class="textinput" type="text" name="City" maxlength="20" required>
					<br><br>
					<p>Telephone:</p>
						<input class="textinput" type="text" name="Telephone" maxlength="10" pattern="[0-9]{9,10}"   required title="Telephone must be 10 Digits only">
					<br><br>
					<p>Mobile:</p>
						<input class="textinput" type="text" name="Mobile" maxlength="10" pattern="[0-9]{10,10}"   required title="Mobile must be 10 Digits only">
					<br><br>
					<p><input class="button" type="submit" value="Add New"/></p>
				</form>
			</div>');
	
	//Check if form is submitted
	if ( isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['FirstName']) && isset($_POST['Surname']) && isset($_POST['AddressLine1']) && isset($_POST['AddressLine2']) && isset($_POST['City']) && isset($_POST['Telephone']) && isset($_POST['Mobile']) ) 
	{
		$u = $_POST['Username'];
		$p = $_POST['Password'];
		$f = $_POST['FirstName'];
		$s = $_POST['Surname'];
		$a1 = $_POST['AddressLine1'];
		$a2 = $_POST['AddressLine2'];
		$c = $_POST['City'];
		$t = $_POST['Telephone'];
		$m = $_POST['Mobile'];
		
		//Check if username already exists
		$result=mysqli_query($db,"SELECT * FROM users WHERE Username='$u' ");
		$count=mysqli_num_rows($result);
		if($count==1)
		{		
			echo ('<p style="padding:1vh;">Username Exists</p><p><a class="links" href="add_new_user.php">Retry Registration</a></p>');
		}
		else
		{
			//Insert new user into database
			mysqli_query($db,"INSERT INTO users (Username,Password,FirstName,Surname,AddressLine1,AddressLine2,City,Telephone,Mobile) VALUES ('$u', '$p', '$f', '$s', '$a1', '$a2', '$c', '$t', '$m')");
			echo ('<p style="padding:1vh;">Registration Complete<br> <a class="links" href="index.php">Continue</a> </P>');
		}
	}
	//footer & close database
	require_once "footer.php";
?>