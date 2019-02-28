<?php
	require_once "header.php";
	if(isset($_SESSION["Username"]))
	{
		$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);
		$uname = $_SESSION["Username"];
		//Remove Reservation from tables
		mysqli_query($db, "DELETE FROM reservations WHERE ISBN ='$ISBN' and Username='$uname'");
		mysqli_query($db, "UPDATE books INNER JOIN reservations ON books.ISBN=reservations.ISBN and reservations.Username='$uname' SET books.Reserved='N' WHERE books.ISBN='$ISBN' ");
		echo('<p>Reservation Removed</p>');	 
	}
	else
	{
		header("location:index.php");
	}
	
	require_once "footer.php";
?>