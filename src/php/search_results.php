<?php
	require_once "header.php";
	if(isset($_SESSION["Username"]))
	{
		require_once "search.php";
		if ( isset($_POST['SearchDrop']))
		{

			$SearchDrop = $_POST['SearchDrop'];
			$SearchDrop = stripslashes($SearchDrop);
			$SearchDrop = mysqli_real_escape_string($db, $SearchDrop);
			
			//Select Book details from databases by category id
			$sql = "SELECT books.BookTitle, books.Author, books.Edition, books.year, books.ISBN, books.Reserved FROM category INNER JOIN books ON category.CategoryID=books.Category and category.CategoryDescription='$SearchDrop'";
			$result = mysqli_query($db, $sql);
			echo('<div id="results">');
			
			//Loop through all matches
			while ($row = mysqli_fetch_row($result))
			{
				
				echo('<h3>');
				echo(htmlentities($row[0]));
				echo('</h3><p>');
				echo('Author: ' . htmlentities($row[1]) . '<br>');
				echo('Edition: ' . htmlentities($row[2]) . '<br>');
				echo('Year: ' . htmlentities($row[3]) . '<br>');
				echo('ISBN: ' . htmlentities($row[4]) . '<br>');
				if($row[5] == 'N')
				{
					$row[5] = 'No';
				}
				else if($row[5] == 'Y')
				{
					$row[5] = 'Yes';
				}
				echo('Reserved: ' . htmlentities($row[5]) . '<br>');
				if($row[5] == 'No')
				{
					echo('<a href="reserve.php?ISBN='.htmlentities($row[4]).'">Reserve book</a>');
				}
				echo('<br></p>');
			}
			echo('</div>');
		}
		else if ( isset($_POST['Search']))
		{
			$Search = $_POST['Search'];
			$Search = stripslashes($Search);
			$Search = mysqli_real_escape_string($db, $Search);
			
			//Select Book details from databases by partial search
			$sql = "SELECT BookTitle, Author, Edition, Year, ISBN, Reserved FROM books WHERE BookTitle LIKE '%$Search%' OR Author LIKE '%$Search%'";
			
			$result = mysqli_query($db, $sql);
			echo('<div id="results">');
			
			//Loop through all matches
			while ($row = mysqli_fetch_row($result))
			{
				
				echo('<h3>');
				echo(htmlentities($row[0]));
				echo('</h3><p>');
				echo('Author: ' . htmlentities($row[1]) . '<br>');
				echo('Edition: ' . htmlentities($row[2]) . '<br>');
				echo('Year: ' . htmlentities($row[3]) . '<br>');
				echo('ISBN: ' . htmlentities($row[4]) . '<br>');
				if($row[5] == 'N')
				{
					$row[5] = 'No';
				}
				else if($row[5] == 'Y')
				{
					$row[5] = 'Yes';
				}
				echo('Reserved: ' . htmlentities($row[5]) . '<br>');
				if($row[5] == 'No')
				{
					echo('<a href="reserve.php?ISBN='.htmlentities($row[4]).'">Reserve book</a>');
				}
				echo('<br></p>');
			}
			echo('</div>');
		}
	}
	else
	{
		header("location:index.php");
	}
	
	
	require_once "footer.php";
?>