<?php
	session_start();
	if (isset($_SESSION['loggedincust']) && $_SESSION['loggedincust'] == true) 
	{
		echo '<div class = "hello">';
    	echo "<h2>Hello  " . $_SESSION['username'] . "! </h2>";
    	echo '<br>';
    	echo '<form method="POST" align = "center">';
    	echo '<button type="submit" class="btn btn-danger id="logout" name="logout">LOG OUT</button>';
    	echo '</form>';
    	echo '</div>';
	}
	$username = "b9f744f1f8eff2";
	$password = "8cff06d6";
	$host = "us-cdbr-east-05.cleardb.net";

	$connector = mysqli_connect($host,$username,$password)
	or die("Unable to connect");
	$selected = mysqli_select_db($connector,"heroku_f6fd5729b854288")
    or die("Unable to connect");

    $result = "SELECT * FROM menu";
    $execute = mysqli_query($connector,$result)
?>
<!DOCTYPE html>
	<head>
		<meta charset="UTF-8">
        <title>MENU</title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href='https://fonts.googleapis.com/css?family=Akronim' rel='stylesheet'>
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    
    </head>
    <body>
    	<style type="text/css">
			h1
			{
				font-family: 'Akronim';
				font-size: 100px;
				color: red;
			}
    		.hello
    		{
    			position: absolute;
  				top: 2px;
  				right: 180px;
    		}
    	</style>
    	<?php
    		if(array_key_exists('logout', $_POST))
  			{
  				$_SESSION['loggedincust'] = false;
  				echo '<script>window.location.href="foodshala.html"</script>';
  			}
   		?>
   		<div><h1>&nbsp&nbsp&nbsp&nbsp&nbspFOODSHALA</h1></div>
 
    	<div class="container">
    		<table id="menu" class="table table-hover table-responsive">
    		
    			<thead>
    	    		<tr bgcolor="#ffff33">
	          			<th><h4>RESTRAUNT NAME</h4></th>
          				<th><h4>DISH</h4></th>
          				<th><h4>PRICE</h4></th>
          				<th><h4>VEG/NON VEG</h4></th>
        	  			<th><h4>ORDER</h4></th>
    	      		</tr>
	      		</thead>

      			<tbody>
        			<?php
          				while( $row = mysqli_fetch_assoc( $execute ) )
          				{
            				echo "<tr bgcolor='#ffffcc'>
            	  			<td>{$row['r_name']}</td>
        	      			<td>{$row['dish']}</td>
              				<td>{$row['price']}</td>
             				<td>{$row['pref']}</td>
           					<td>  <a href='order-validation.php?id=" . $row['id'] . " '><button type = 'button' class='btn btn-warning'>ORDER</button></a> </td>";
          				}
        			?>
      			</tbody>
      		</table>
    	</div>
     	
    	<?php
    		mysqli_close($connector); 
    	?>

    </body>
</html>
