<!DOCTYPE PHP>
<head>
	<title>Douglas Quinn - Pick 3</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
	<link href="includes/css/styles2.css" rel="stylesheet">
	<script src="includes/js/modernizr-2.6.2.min.js"></script>
	<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
	<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
</head>
<html>
	<body>
		<div class="container" id ="main">
			<div class="navbar navbar-fixed-top">
				<div class="container">
					<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="nav-collapse collapse navbar-responsive-collapse">
						<ul class="nav navbar-nav pull-left">
							<li>
								<p id="name">&nbspDouglas Quinn&nbsp&nbsp&nbsp&nbsp</p>
							</li>
							<li class="active">
								<a href="home.html" id="home">Home</a>
							</li>
							<li class="dropdown">
								<a href="home.html" class="dropdown-toggle" data-toggle="dropdown">Portfolio&nbsp&nbsp&nbsp<strong class="caret"></strong></a>
								<ul class="dropdown-menu">
									<li>
                                        <a href="MAXXPotential.html">MAXX Potential</a>
                                    </li>
									<li>
										<a href="random_numbers.html">Random Number</a>
									</li>
									<li class="divider"></li>
									<li class="dropdown-header">Generate Lottery Numbers</li>
									<li>
										<a href="match_pick3.php">Pick 3</a>
									</li>
									<li>
										<a href="match_pick4.php">Pick 4</a>
									</li>
									<li>
										<a href="match_cash5.php">Cash 5</a>
									</li>
									<li>
										<a href="match_mega.php">Mega Millions</a>
									</li>
									<li>
										<a href="match_power.php">Powerball</a>
									</li>
								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav pull-right">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp;<span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;My Account&nbsp;&nbsp;&nbsp;<stong class="caret"></stong></a>
								<ul class="dropdown-menu">
									<!--<li>
										<a href="update.html"><span class="glyphicon glyphicon-wrench">&nbsp;&nbsp;&nbsp;Update Profile</span></a>
									</li> -->
									<li class="divider"></li>
									<li>
										<a href="logout.php"><span class="glyphicon glyphicon-off">&nbsp;&nbsp;&nbsp;Sign Out</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row" id="bigCallout">
				<div class="col-12">
					<div class="well well-small visible-sm">
						<a href="" class="btn btn-large btn-block btn-default"><span class="glyphicon glyphicon-phone"></span> Give me a call!</a>
					</div>
					<div class="well">
						<div class="page-header">
							<h1>VA Lottery <small>Pick 3</small></h1>
							<h4>This was created in PHP and will generate a VA Lottery, Pick 3 number.  It will then access a MYSQL database with all the Pick 3 winning lottery numbers and tell you if the number created has ever won.</h4>
						</div>
						<p class="lead">
							<?php
								$numbers = array();
								$nums = 3;
								$min = 1;
								$max = 9;
								$text = "Your lottery numbers are: ";
								$match = "</br>Your lottery numbers won on: ";
								$noMatch = "</br>Your lottery numbers have never won.";
								$servername = "localhost";
								$username = "dougla10_douglas";
								$password = "my.P0rtfolio.!";
								$dbname = "dougla10_my_portfolio";
								$conn = mysqli_connect($servername, $username, $password, $dbname);
								
								for ($i = 0; $i < $nums; $i++) {
									$x = rand($min, $max);
									$numbers[$i] = $x;
								}
								
								sort($numbers);

								for ($i = 0; $i < $nums; $i++) {
									$lotto = $lotto.$numbers[$i];
									if ($i < $nums - 1) {
										$lotto = $lotto.",";
									}
								}

								$text = $text.$lotto;
								$sql = "SELECT date_hit FROM lottery_pick3 WHERE day LIKE '$lotto' OR night LIKE '$lotto'";
									  		
								echo $text;
								$result = mysqli_query($conn,$sql);

								if (mysqli_num_rows($result)>0) {
									echo $match;
									while($row = mysqli_fetch_array($result)) {
										echo "</br>".$row['date_hit'];
									}
								}
								else {
									echo $noMatch;
								}

								mysqli_close($conn);				
							?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>