<?php
	session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
	{
		echo '<div><h1>&nbsp&nbsp&nbsp&nbsp&nbspFOODSHALA</h1></div>';
		echo '<div class="webd">';
		echo '<form method="POST" align="center">';
    	echo "<h2><center>Welcome  " . $_SESSION['user_name'] . "! </h2>";
    	echo '<button type="submit" class="btn btn-danger" id="logout" name="logout">LOG OUT</button>';
    	echo '</form>';
    	echo "</div>";
    	
	} 
	else 
	{
    	echo '<script>alert("Please log in first to see this page.")</script>';
    	echo '<script>window.location.href="foodshala.html"</script>';
	}
	
	$server = "us-cdbr-east-05.cleardb.net";
	$user = "b9f744f1f8eff2";
	$pass = "8cff06d6";

	$check = mysqli_connect($server,$user,$pass);

	$con = mysqli_select_db($check,"heroku_f6fd5729b854288");
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<link href='https://fonts.googleapis.com/css?family=Akronim' rel='stylesheet'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	<script type="text/javascript">
		
	</script>


	<style type="text/css">
		input[type=text] 
		{
  			padding: 12px 20px;
  			margin: 8px 0;
  			box-sizing: border-box;
		}
		.sublime
		{
			background-color: #00b3b3;
  			color: black;
  			padding: 5px 5px;
  			border: none;
  			cursor: pointer;
  			border-radius: 10px;
		}
		h1
			{
				font-family: 'Akronim';
				font-size: 100px;
				color: red;
			}
		.webd
    		{
    			position: absolute;
  				top: 2px;
  				right: 180px;
    		}
	</style>

</head>
<body>
	<br>
	<br>
	<br>
	<form method="POST" align = "center" >

		<button type="submit" class="btn btn-success" id="ordereditems" name="ordereditems">ORDERS</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

        <button type="submit" class="btn btn-info" id="showmenu" name="showmenu">SHOW MENU</button>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        
        <button type="submit" class="btn btn-warning" id="addmenu" name="addmenu">ADD MENU</button>
    
	</form>
	
</body>
</html>
<?php
	if(array_key_exists('showmenu', $_POST)) 
	{ 
        $sql123 = "SELECT dish, price, pref from menu WHERE r_name = '".$_SESSION['user_name']."'";
		$execute123 = mysqli_query($check,$sql123);
		echo '<br>';
	echo '<br>';
		echo '<div class="container" align="center">
    		<table id="menu" class="table table-hover table-responsive">
    		
    			<thead>
    	    		<tr>
          				<th><h4>DISH</h4></th>
          				<th><h4>PRICE</h4></th>
          				<th><h4>VEG/NON-VEG</h4></th>
    	      		</tr>
	      		</thead>

      			<tbody>';
          				while( $row = mysqli_fetch_assoc( $execute123 ) )
          				{
            				echo "<tr>            	  			
        	      			<td>{$row['dish']}</td>
              				<td>{$row['price']}</td>
              				<td>{$row['pref']}</td>";
						
              				echo "</tr>";
           				}
        			
      			echo '</tbody>
      		</table>
    	</div>';
    } 

    else if(array_key_exists('ordereditems', $_POST)) 
    {
    	echo '<br>';
    	echo '<br>';
    	$sql =  "SELECT c_name, dish, price from orders WHERE r_name = '".$_SESSION['user_name']."'";
		$execute = mysqli_query($check,$sql);
		echo '<div class="container" align="center">
    		<table id="menu" class="table table-hover table-responsive">
    		
    			<thead>
    	    		<tr>
          				<th><h4>CUSTOMER NAME</h4></th>
          				<th><h4>DISH</h4></th>
          				<th><h4>PRICE</h4></th>
					<th><h4>DATE-TIME</h4></th>
    	      		</tr>
	      		</thead>

      			<tbody>';
          				while( $row = mysqli_fetch_assoc( $execute ) )
          				{
            				echo "<tr>
            	  			<td>{$row['c_name']}</td>
        	      			<td>{$row['dish']}</td>
              				<td>{$row['price']}</td>
					<td>{$row['dt']}</td>";
              				echo "<tr>";
           				}
      			echo '</tbody>
      		</table>
    	</div>';
    }

    else if (array_key_exists('addmenu', $_POST)) 
    {
    	echo "<br>";
    	echo '<form action ="process.php" method="POST" align="center">';
		
		echo '<br><br><input type="text" size="50" placeholder = "Enter Dish Name" name="dish" required><br><br>';
		
		echo '<input type="text" size="50" placeholder = "Enter Price" name="price" required><br><br>';
		
		echo '<label class="sublime">';
		echo '<input type="radio" id="veg" name="custpref" value="veg" required >';
		echo '<label for="veg"><b>&nbsp VEG</b></label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
		echo '</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';

		echo '<label class="sublime">';
		echo '<input type="radio" id="non-veg" name="custpref" value="non-veg" >';
		echo '<label for="non-veg"><b>&nbsp NON-VEG</b></label>';
		echo '</label>';
		echo '<br>';
		echo '<br>';
		echo '<br>';
		echo '<input type="submit" class="btn btn-primary" style ="padding: 10px 30px";>';
		echo '</form>';
    }
    if(array_key_exists('logout', $_POST))
  	{
  		$_SESSION['loggedin'] = false;
  		echo '<script>window.location.href="foodshala.html"</script>';
  	}
?>
