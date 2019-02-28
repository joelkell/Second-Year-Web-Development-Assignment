<?php
	if(isset($_SESSION["Username"]))
	{
		//Searchbar
		echo('<div id="twoFlex">
				<div id="search">
					<form method = "post" action="search_results.php">
							<input type="text" name="Search" placeholder="Search" required> 
							<input class="button2" type="submit" value="Search"/>
					</form>
				</div>
				<div id="drop">
					<form id="searchForm" method = "post" action="search_results.php">
						<select required form="searchForm" name="SearchDrop">');
		
		//Selet all Categories from Database and put into dropdown list
		$result = mysqli_query($db,"SELECT CategoryDescription FROM category");
		//loop through results
		while ( $row = mysqli_fetch_row($result) ) 
		{
			echo('<option value="'.htmlentities($row[0]).'">');
			echo(htmlentities($row[0]));
			echo('</option>');
		}
		
		echo('</select><input class="button2" type="submit" value="Search"/>
					</form>
				</div>
			</div>');
	}
	else
	{
		header("location:index.php");
	}
?>