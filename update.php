
<?php
    $errorCount = 0;
    $servername = "localhost";
	$username = "dougla10_douglas";
	$password = "myP0rtfolio";
	$dbname = "dougla10_my_portfolio";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$currentUser = stripslashes($_POST['currentUsername']);
	$currentPass = stripslashes($_POST['currentPassword']);
	$updatePass = stripslashes($_POST['updatePassword']);
	$fName = stripslashes($_POST['updateFirstName']);
	$lName = stripslashes($_POST['updateLastName']);
	$email = stripslashes($_POST['updateEmail']);
	$phone = stripslashes($_POST['updatePhone']);
	$userCheck = "SELECT username FROM guest_book";
	$userResult = mysqli_query($conn,$userCheck);
	$sql1 = "UPDATE guest_book SET ";
	$sql2 = "WHERE username = '$currentUser';";
    

    if(empty($_POST["updateUsername"])) {
        echo "You have selected to update your username but nothing was entered.";
        ++$errorCount;
    }
    else {
		while($row = mysqli_fetch_array($userResult)) {
			if ($row['username'] == $updateUser) {
			    ++$errorCount;
			    break;
			}
		}
		
		if($errorCount > 0) {
		    echo "The username ".$updateUser." is already being used.  Please choose another username.<br />\n";
		}
		else {
		    $updateUser = stripslashes($_POST['updateUsername']);
		    $sql1 = $sql1."username = '$updateUser', ";
		}
    }
    mysqli_close($conn);
    echo $sql1;
        
	/*if (empty($_POST["createUsername"]) || empty($_POST["createPassword"]) || empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["email"]) || empty($_POST["phone"])) {
		echo "<p>You must fill in all the fields.  Click your browser's back button to return to the create account page.</p>";
	}
	else {
	    $errorCount;
		$servername = "localhost";
		$username = "dougla10_douglas";
		$password = "myP0rtfolio";
		$dbname = "dougla10_my_portfolio";
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		$createUser = stripslashes($_POST['createUsername']);
		$createPass = stripslashes($_POST['createPassword']);
		$fName = stripslashes($_POST['firstName']);
		$lName = stripslashes($_POST['lastName']);
		$email = stripslashes($_POST['email']);
		$phone = stripslashes($_POST['phone']);
		$userCheck = "SELECT username FROM guest_book";
		$userResult = mysqli_query($conn,$userCheck
		
		while($row = mysqli_fetch_array($userResult)) {
			if ($row['username'] == $createUser) {
			    echo "The username ".$createUser." is already being used.  Please choose another username.<br />\n";
			    ++$errorCount;
			    break;
			}
		}
		
		if(preg_match("/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[a-z]{2,})$/i", $email) === 0) {
			echo $email." is not a valid email address.<br />\n";
			++$errorCount;
		}
		
		if(preg_match("/^(\(?\d{3}\)?)([ -]?)(\d{3})([ -])(\d{4})$/", $phone) === 0) {
			echo "\"$phone\" is not a valid phone number.  Please enter the phone number in the following format: (xxx) xxx-xxxx<br />\n";
			++$errorCount;
		}
						
		if($errorCount > 0) {
			echo "Please use the \"Back\" button to re-enter the data.<br/>\n";
	    }
		else {
    		$sql = "INSERT INTO guest_book VALUES(null, NOW(), '$createUser', '$createPass', '$fName', '$lName', '$email', '$phone')";
    		$result = mysqli_query($conn,$sql);
    		mysqli_close($conn);
    		echo '<script type="text/javascript">window.open("http://douglasandersonquinn.com/","_self",false)</script>';
		}
	}*/
?>