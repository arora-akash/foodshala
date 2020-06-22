<?php
	session_start();
	if (isset($_SESSION['loggedincust']) && $_SESSION['loggedincust'] == true) 
	{
		echo "<br>";
    	echo "<h1>Hello  " . $_SESSION['username'] . "! </h1>";
	}
	else
	{
		echo '<script>alert("Please log in first to see this page.")</script>';
    	echo '<script>window.location.href="foodshala.html"</script>';	
	}

	$username = "root";
	$password = "";
	$host = "localhost";

	$check = mysqli_connect($host,$username,$password)
	or die("Unable to connect");
    $con = mysqli_select_db($check,"foodshala");
    if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	$txt= $_GET['id'];

	$sql="SELECT r_name FROM menu WHERE id='$txt'";
	$result = mysqli_query($check,$sql);
	$row1 = mysqli_fetch_array($result);
	
	$sql1="SELECT dish FROM menu WHERE id='$txt'";
	$res = mysqli_query($check,$sql1);
	$row2 = mysqli_fetch_array($res);

	$sql2 = "SELECT price FROM menu WHERE id='$txt'";
	$que = mysqli_query($check,$sql2);
	$row3 = mysqli_fetch_array($que);

	$sql3 = " INSERT INTO orders VALUES('$row1[0]','$row2[0]','$row3[0]','".$_SESSION['username']."') ";
	$execute = mysqli_query($check,$sql3);

	if($execute)
	{
		echo '<script>alert("ORDER PLACED")</script>';
		echo '<script>window.location.href="menu.php"</script>';
	}
?>