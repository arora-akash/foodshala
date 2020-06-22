<?php

	$server = "localhost";
	$user = "root";
	$pass = "";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"foodshala");

	$name = $_POST["naam"];
	$mobile = $_POST["mobile"];
	$pref = $_POST["custpref"];
	$password = $_POST["passw"];

	$name = test_input($name);
	$mobile = test_input($mobile);

	function test_input($str)
	{
		$str=trim($str);
		$str=stripslashes($str);
		return $str;
	}

	$insertstmt = "INSERT INTO customer VALUES('$name','$mobile','$pref','$password')" ;
	$executestmt = mysqli_query($check,$insertstmt);

	if($executestmt)
	{
			echo '<script>alert("REGISTRATION SUCCESSFULL")</script>';
			echo '<script>window.location.href="foodshala.html"</script>';
	}
	else
	{
		echo '<script>alert("MOBILE NUMBER '.$mobile.' ALREADY REGISTERED ")</script>';
		echo '<script>window.location.href="customer-registration.html"</script>';
	}
	mysqli_close($check);
?>


