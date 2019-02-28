<?php
	//header & open database
	require_once "header.php";
	
	//If User is logged in:
	if(isset($_SESSION["Username"]))
	{
		//header("location:search.php");
		require_once "header.php";
		require_once "search.php";
		require_once "footer.php";
	}
	else // If user has not logged in:
	{
		//Login Form
		echo('<p id="loginP"> Login </p>
				<div class="form">
					<form method = "post">
						<p>Username:</p>
							<input class="textinput" type="text" name="Username" required>
						<br><br>
						<p>Password:</p>
							<input class="textinput" type="password" name="Password" maxlength="6" required>
						<br><br>
						<p><input class="button" type="submit" value="Login"/></p>
					
				');
				
		if ( isset($_POST['Username']) && isset($_POST['Password'])) 
		{
			// username and password sent from form 
			$Username=$_POST['Username']; 
			$Password=$_POST['Password']; 
			
			// To protect MySQL injection
			$Username = stripslashes($Username);
			$Password = stripslashes($Password);
			$Username = mysqli_real_escape_string($db, $Username);
			$Password = mysqli_real_escape_string($db, $Password);

			//Attempt to select user from database
			$sql="SELECT * FROM users WHERE Username='$Username' and Password='$Password' ";
			$result=mysqli_query($db, $sql);
			$count=mysqli_num_rows($result);
			if($count==1)//If user exists and password is correct
			{
				session_start();
				$_SESSION["Username"]=$Username;
				$_SESSION["Password"]=$Password;
				header("location:index.php");
			}
			else//If wrong username or password
			{
				echo ('<p style="color:red;padding-left:5vw;">Wrong Username or Password</p>');
			}
		}
	}
	
	echo('</form>
				</div>
		<div id="link">
			<a class="links" href="add_new_user.php?">Register New Account</a>
		</div>');
	
	//footer & close database
	require_once "footer.php";	
?>