<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
            "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>
			Powerball
		</title>
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>
    <body>
    	<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "my_portfolio";

			$conn = mysqli_connect($servername, $username, $password, $dbname);
			
			$pattern1 = '/[^;]*/';
			$pattern2 = '/; (.*?);/';
			$pattern3 = '/Powerball: (.*?);/';
			
			if (!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			echo "Connected successfully. ";

			$handle = fopen("Powerball.txt", "r");
			if ($handle) {
    			while (($line = fgets($handle)) !== false) {
        			preg_match($pattern1, $line, $match1);
        			preg_match($pattern2, $line, $match2);
					preg_match($pattern3, $line, $match3);
					rtrim($match3);
					$sql = "INSERT INTO lottery_power VALUES(NULL, '$match1[0]', '$match2[1]', '$match3[1]')";

					if (mysqli_query($conn, $sql)) {
						echo "New record created successfully";
						
					} 
					else {
					    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
		    	}

    			fclose($handle);
			} 
			else {

			}

			mysqli_close($conn);				
		?>
    </body>	
</html>