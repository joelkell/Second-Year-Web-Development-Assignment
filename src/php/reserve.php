<?php
	require_once "header.php";
	if(isset($_SESSION["Username"]))
	{
		$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);
		$uname = $_SESSION["Username"];
		$date = date("Y-m-d");
		//Reserve book and update tables
		mysqli_query($db, "INSERT INTO reservations (ISBN,Username,ReservedDate) VALUES ('$ISBN', '$uname', '$date')");
		mysqli_query($db, "UPDATE books SET Reserved='Y' WHERE ISBN='$ISBN' ");
		echo('<p>Book Reserved</p>');	 
	}
	else
	{
		header("location:index.php");
	}
	
	require_once "footer.php";
?>