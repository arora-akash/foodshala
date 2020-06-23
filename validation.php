<?php

	$server = "us-cdbr-east-05.cleardb.net";
	$user = "b9f744f1f8eff2";
	$pass = "8cff06d6";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"heroku_f6fd5729b854288");

	$kon = $_POST["users"];
	$mob = $_POST["mobile"];
	$pswd = $_POST["pswd"];

	if($kon === "restraunt")
	{
		$sql="SELECT * FROM restraunt WHERE r_mobile='$mob' and r_pass='$pswd'";
		$result=mysqli_query($check,$sql);

		$count=mysqli_num_rows($result);

		if($count==1)
		{
    		session_start();
    		$_SESSION['loggedin'] = true;
    	
    		$var = "SELECT r_name FROM restraunt WHERE r_mobile='$mob' ";
    		$execute = mysqli_query($check,$var);
    		$row = mysqli_fetch_array($execute);
    		$_SESSION['user_name'] = $row[0];
    		echo '<script>alert("WELCOME")</script>';
    		echo '<script>window.location.href="restraunt-menu.php"</script>';
		}
		else
		{
			echo '<script>alert("INVALID CREDENTIALS")</script>';
			echo '<script>window.location.href="foodshala.html"</script>';
		}
	}
	else
	{
		$sql = "SELECT * FROM customer WHERE c_mobile='$mob' and c_pass='$pswd'";
		$result=mysqli_query($check,$sql);

		$count=mysqli_num_rows($result);

		if($count==1)
		{

    		session_start();
    		$_SESSION['loggedincust'] = true;
    		$var = "SELECT c_mobile FROM customer WHERE c_mobile='$mob' ";
    		$execute = mysqli_query($check,$var);
    		$row = mysqli_fetch_array($execute);

    		$_SESSION['username'] = $row[0];
    		echo '<script>alert("WELCOME")</script>';
    		echo '<script>window.location.href="menu.php"</script>';
		}

		else
		{
			echo '<script>alert("INVALID CREDENTIALS")</script>';
			echo '<script>window.location.href="foodshala.html"</script>';
		}
	}
?>
