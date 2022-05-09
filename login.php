<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Log-in &#9760;</title>
</head>
<body>

	<style type="text/css">
	body
	{
	
		background-image : url("box.jpg") ; 
		background-size:cover; 
			
	}
	
	#text{

		color:#2107FE;
		font-size: 40px;
		height: 40px;
		border-radius: 50px;
		padding: 4px;
		/* border: solid thin #aaa; */
		width: 100%;
		border: 1px solid black;
		text-align:center;

	}

	#button{

		opacity: 0.9;
		padding: 15px;
		width: 100px;
		color: #2329D7;
		
		border: none;
		font-family:'Tajawal','sans-serif';
        font-weight:bold;
		font-size: 30px;
		background-color:#FEB707;
	    text-align:center; 
		
	}

	#box{

		background-image : url("bo1.jpg") ; 
	    background-size:cover;

		margin: auto;
		width: 700px;
		padding: 150px;
		
	}
	a
	{
		font-size: 40px;
		color:#9C2305;
		float : center;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 160px;margin: 20px;color:#E10EB5;text-align:center;font-family:Lucida Handwriting;">Log-In</div><br><br>
			<label style ="color:#FE0721;font-size: 70px;" >Your name</label><br>
			<input id="text" type="text" name="user_name"><br><br>
			<label style ="color:#FE0721;font-size: 70px;" >Password</label><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Sig-nup</a><br><br>
		</form>
	</div>
</body>
</html>


