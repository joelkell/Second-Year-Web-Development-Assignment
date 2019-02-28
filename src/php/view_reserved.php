<?php
	require_once "header.php";
	if(isset($_SESSION["Username"]))
	{
		$Username = $_SESSION['Username'];
		$Username = stripslashes($Username);
		$Username = mysqli_real_escape_string($db, $Username);
		
		//Select Reserved books from tables
		$sql = "SELECT books.BookTitle, books.Author, books.Edition, books.year, books.ISBN FROM reservations INNER JOIN books ON books.ISBN=reservations.ISBN and reservations.Username='$Username' ";
		
		$result = mysqli_query($db, $sql);
		$count=mysqli_num_rows($result);
		echo('<div id="results">');
		//Loop through all matches
		if($count>0)
		{
			while ($row = mysqli_fetch_row($result))
			{
				
				echo('<h3>');
				echo(htmlentities($row[0]));
				echo('</h3><p>');
				echo('Author: ' . htmlentities($row[1]) . '<br>');
				echo('Edition: ' . htmlentities($row[2]) . '<br>');
				echo('Year: ' . htmlentities($row[3]) . '<br>');
				echo('ISBN: ' . htmlentities($row[4]) . '<br>');
				echo('<a href="remove_reserved.php?ISBN='.htmlentities($row[4]).'">Remove Reservation</a>');
				echo('<br></p>');
			}
		}
		else
		{
			echo('<h3> No Reservations</h3>');
		}
		echo('</div>');
	}
	else
	{
		header("location:index.php");
	}
	
	require_once "footer.php";
?>