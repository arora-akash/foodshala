<?php
	$server = "us-cdbr-east-05.cleardb.net";
	$user = "b9f744f1f8eff2";
	$pass = "8cff06d6";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"heroku_f6fd5729b854288");

	$dish = $_POST["dish"];
	$custpref = $_POST["custpref"];

	$dish = test_input($dish);
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

	if($count==0)
	{
		echo '<script>alert("NO SUCH DISH EXIST! CHECK FOR CORRECT SPELLING OF THE DISH! OR CHECK FOR VEG/NON-VEG")</script>';
		echo '<script>window.location.href="restraunt-menu.php"</script>';		
	}
	
	$insertstmt = "DELETE FROM menu WHERE dish='$dish' and pref='$custpref'";
	$executestmt = mysqli_query($check,$insertstmt);
	
	if($executestmt)
	{
			echo '<script>alert("DELETION SUCCESSFULL")</script>';
			echo '<script>window.location.href="restraunt-menu.php"</script>';
	}
	else
	{
		echo '<script>alert("CHECK FOR MISTAKES")</script>';
		echo '<script>window.location.href="restraunt-menu.php"</script>';
	}
	mysqli_close($check);

?>
