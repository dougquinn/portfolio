<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Login</title>
		<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
		<link href="includes/css/main.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	</head>
    <body>
		<?php
			if ($_POST["login"]) {
				if (empty($_POST["username"]) || empty($_POST["password"])) {
					echo "<p>You must enter your username and password.  Click your browser's back button to return to the login page.</p>";
				}
				else {	
					$servername = "localhost";
					$username = "dougla10_douglas";
					$password = "my.P0rtfolio.!";
					$dbname = "dougla10_my_portfolio";
					$conn = mysqli_connect($servername, $username, $password, $dbname);
					$user = stripslashes($_POST['username']);
					$pass = stripslashes($_POST['password']);
					$sql = "SELECT * FROM guest_book WHERE username LIKE '$user' AND password LIKE '$pass'";
					$result = mysqli_query($conn,$sql);
					
					if (mysqli_num_rows($result)>0) {
						while($row = mysqli_fetch_array($result)) {
							if ($row['username'] == $user && $row['password'] == $pass) {
							    $message = $row[firstName]." ".$row[lastName]." visited your webpage at ".date("h:i")." on ".date("l, F d, Y").".";
								mail('douglas.quinn3827@gmail.com', 'New visitor to douglasandersonquinn.com', $message);
								$messageVisitor = "Hello ".$row[firstName]." ".$row[lastName].". Thank you for visiting my webpage on ".date("l, F d, Y")." I hope you liked what you saw.";
								mail($row[email], 'Thanks for visiting', $messageVisitor);
								echo '<script type="text/javascript">window.open("home.html","_self",false)</script>';
							}
						}
					}
					else {
						echo "<p id='noMatch'>Your username and password do not match our records.<br />Click your browser's back button to return to the login page.</p>";
					}
				}
			}
		?>
    </body>	
</html>