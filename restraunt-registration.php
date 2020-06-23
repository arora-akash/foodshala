<?php

	$server = "us-cdbr-east-05.cleardb.net";
	$user = "b9f744f1f8eff2";
	$pass = "8cff06d6";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"heroku_f6fd5729b854288");

	$name = $_POST["naam"];
	$mobile = $_POST["mobile"];
	$password = $_POST["passw"];

	$name = test_input($name);
	$mobile = test_input($mobile);
	

	function test_input($str)
	{
		$str=trim($str);
		$str=stripslashes($str);
		return $str;
	}

	
	$insertstmt = "INSERT INTO restraunt VALUES('$name','$mobile','$password')" ;
	$executestmt = mysqli_query($check,$insertstmt);
	
	if($executestmt)
	{
			echo '<script>alert("REGISTRATION SUCCESSFULL")</script>';
			echo '<script>window.location.href="foodshala.html"</script>';
	}
	else
	{
		echo '<script>alert("MOBILE NUMBER ALREADY REGISTERED")</script>';
		echo '<script>window.location.href="restraunt-registration.html"</script>';
	}
	mysqli_close($check);

?>
