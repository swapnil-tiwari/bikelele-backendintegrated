<?php
	session_start();
	if(isset($_POST['user_signup']))
	{
		$id = substr(md5(microtime()), 0, 9);  
		$name= $_POST['name'];
		$email= $_POST['email'];
		$cno=$_POST['cno'];
		$address= $_POST['address'];
		$password = $_POST['pass'];

		echo $cno;

		require('connect.php');

		$user_signup_query= "INSERT INTO users(userid, username , email, password, contactnumber,address ) VALUES ('$id', '$name', '$email' ,'$password','$cno', '$address')";

		if(mysqli_query($conn, $user_signup_query))
		{
			
			$_SESSION['id']= $id;
			$_SESSION['login_state']=true;
			$_SESSION['username']= $name;
			$_SESSION['email']= $email;
			$_SESSION['contactnumber']= $cno;
			$_SESSION['address']= $address;

			

			header('location:../index.php');
		}
		else
		{
			 echo mysqli_error($conn);
			
		}
	}
	else if(isset($_POST['user_login']))
	{
		$email= $_POST['email'];
		$password= $_POST['pass'];

		require('connect.php');

		$email_login_query= "SELECT * from users WHERE email = '$email' AND password = '$password'";

		$result=mysqli_query($conn, $email_login_query);
        $count= mysqli_num_rows($result);
		if($count==1)
		{
			while($row = mysqli_fetch_assoc($result))
			{
				$_SESSION['id']= $row['userid'];
				$_SESSION['username']= $row['username'];
				$_SESSION['contactnumber']=$row['contactnumber'];
				$_SESSION['email']= $row['email'];
				$_SESSION['address']= $row['address'];
				$_SESSION['login_state']=true;
			}
			header('location:../index.php?auth=true');

		}
		else
		{
			header('location:../index.php?auth=false');
		}
	}
	else if(isset($_GET['logout']))
	{
		session_destroy();
		session_unset();
		header('location:../index.php');
	}
	else if(isset($_POST['action']) && $_POST['action'] =='fetchSelectedBikes')
	{
		require('connect.php');


		// header("Content-Type: application/json; charset=UTF-8");
		$bikeIds=explode(',',$_POST['bikeIds']);
		$bikes_data_html='';
		foreach($bikeIds as $bikeid)
		{
			
			$bike_query="SELECT * from bikes WHERE bikeid='$bikeid'";
			$result=mysqli_query($conn, $bike_query);
			//var_dump($bikeid);
			
			$count= mysqli_num_rows($result);
			if($count==1)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					$db_bikeid=$row['bikeid'];
					$bikename=$row['bikename'];
					$type=$row['type'];
					$price=$row['price'];
					$status=$row['status'];
					$imgurl=$row['imgurl'];

				}
				//echo $db_bikeid.'<br>';
				$bikes_data_html.= '
				<div class="cart-items">
					<div class="cart-item-pic">
						<img src="../backend_modules/'.$imgurl.'">
					</div>
					<div class="cart-item-details">
						<code>Bike Id: '.$db_bikeid.'</code>
						<h4>'.$bikename.'</h4>
						<p>Price:'.$price.'</p>
						<p>Status:'.$status.'</p>
						<br>
						<!--<a href="#" class="remove small" data-bikeid="'.$db_bikeid.'"><i class="fas fa-trash-alt"></i> Remove</a>-->
					</div>
				</div>
				';
			}
			

			
		}
		echo $bikes_data_html;

		
	}
	else if(isset($_POST['action']) && $_POST['action'] =='fetchAllBikes')
	{
		require('connect.php');


		// header("Content-Type: application/json; charset=UTF-8");
			
			$bike_query="SELECT * from bikes ";
			$result=mysqli_query($conn, $bike_query);
			    //var_dump($result);
				$bikes_data_html='';
				while($row = mysqli_fetch_assoc($result))
				{
					$db_bikeid=$row['bikeid'];
					$bikename=$row['bikename'];
					$type=$row['type'];
					$price=$row['price'];
					$status=$row['status'];
					$imgurl=$row['imgurl'];

					$bikes_data_html.= '
					<div class="bike-item col-sm-3">
						<div class="bike-img">
							<img src="./backend_modules/'.$imgurl.'">
						</div>
						<div class="bike-details">
							<code>Bike Id='.$db_bikeid.'</code>
							<h4>'.$bikename.'</h4>
							<p>Price:'.$price.'</p>
							<p>Type:'.$type.'</p>
							<button class="add-to-cart" onclick="addCartButtonAction.apply(this)" data-price="'.$price.'" data-bikeid="'.$db_bikeid.'" data-bname="'.$bikename.'"><i class="fas fa-cart-plus"></i> Add To
								Cart</button>
						</div>
                	</div>
				';

				}
				//echo $db_bikeid.'<br>';
				
			
			

			
		
		echo $bikes_data_html;

		
	}
	else if(isset($_POST['action']) && $_POST['action'] =='placeOrder')
	{
		date_default_timezone_set("Asia/Kolkata");
			$orderdate=date('d/m/Y');
			$ordertime=date('G:i:s');

		$orderid = substr(md5(microtime()), 0, 9);
		$bikeIds= $_POST['bikeIds'];
		$duration= $_POST['duration'];
		$pickupdate = $_POST['pickupdate'];
		$pickuptime = $_POST['pickuptime'];
		$amount=$_POST['amount'];
		$status='success';
		$paymentmode=$_POST['paymentmode'];
		$userid=$_SESSION['id'];

		require('connect.php');


		$placeorder_query= "INSERT INTO orders (orderid, bikeid , userid, orderdate, ordertime, duration, pickupdate,	pickuptime, amount, paymentmode, status ) VALUES ('$orderid', '$bikeIds','$userid', '$orderdate' ,'$ordertime','$duration', '$pickupdate', '$pickuptime', '$amount', '$paymentmode', '$status')";

		if(mysqli_query($conn,$placeorder_query))
		{
			echo '{status:success,msg:orderplaced}';
		}
		else
		{
			echo mysqli_error($conn); 
		}

	}


?>