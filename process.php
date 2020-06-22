<?php
	session_start();
	$server = "localhost";
	$user = "root";
	$pass = "";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"foodshala");

	$dish = $_POST["dish"];
	$price = $_POST["price"];
	$custpref = $_POST["custpref"];

	$dish = test_input($dish);
	$price = test_input($price);
	$custpref = test_input($custpref);
	

	function test_input($str)
	{
		$str=trim($str);
		$str=stripslashes($str);
		return $str;
	}

	$sql="SELECT * FROM menu WHERE dish='$dish' and pref='$custpref'";
	$result=mysqli_query($check,$sql);
	$count=mysqli_num_rows($result);

	if($count==1)
	{
		echo '<script>alert("ITEM ALREADY EXIST")</script>';
		echo '<script>window.location.href="restraunt-menu.php"</script>';		
	}
	
	$insertstmt = "INSERT INTO menu SET r_name='".$_SESSION['user_name']."',dish='$dish',price='$price',pref='$custpref' ";
	$executestmt = mysqli_query($check,$insertstmt);
	
	if($executestmt)
	{
			echo '<script>alert("INSERTION SUCCESSFULL")</script>';
			echo '<script>window.location.href="restraunt-menu.php"</script>';
	}
	else
	{
		echo '<script>alert("CHECK FOR MISTAKES")</script>';
		echo '<script>window.location.href="restraunt-menu.php"</script>';
	}
	mysqli_close($check);

?>