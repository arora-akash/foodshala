<?php


	$username = "b9f744f1f8eff2";
	$password = "8cff06d6";
	$host = "us-cdbr-east-05.cleardb.net";

	$check = mysqli_connect($host,$username,$password)
	or die("Unable to connect");
    $con = mysqli_select_db($check,"heroku_f6fd5729b854288");
    if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
	session_start();
	if (isset($_SESSION['loggedincust']) && $_SESSION['loggedincust'] == true) 
	{
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
	
		$now = new DateTime();
    		$now->setTimezone(new DateTimeZone('Asia/Kolkata'));
    		$x =  $now->format('Y-m-d H:i:s');

		$sql97="SELECT c_name FROM customer WHERE c_mobile='".$_SESSION['username']."' ";
		$result97 = mysqli_query($check,$sql97);
		$row197 = mysqli_fetch_array($result97);

		$sql3 = " INSERT INTO orders VALUES('$row1[0]','$row2[0]','$row3[0]','$row197[0]','$x','".$_SESSION['username']."') ";
		$execute = mysqli_query($check,$sql3);

		if($execute)
		{
			echo '<script>alert("ORDER PLACED")</script>';
			echo '<script>window.location.href="menu.php"</script>';
		}
	}

	else
	{
		echo '<script>alert("Please log in first to see this page.")</script>';
    	echo '<script>window.location.href="foodshala.html"</script>';	
	}
	
?>
