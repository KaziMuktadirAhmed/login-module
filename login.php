<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username)) {

			//read from database
			$query = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
			$result = mysqli_query($con, $query);

			if($result) {
				if($result && mysqli_num_rows($result) > 0) {

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password) {

						$_SESSION['username'] = $user_data['username'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else {
			echo "wrong username or password!";
		}
	}
?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Log in page</title>
    </head>

    <body>
        <div id="box">
            <form method="POST">
                <div style="font-size: 20px; margin: 10px; color: white;">Login</div>                

                <input id="text" type="text" name="username" placeholder="username" required><br><br>
                <input id="text" type="password" name="password" placeholder="password" required><br><br>

                <input id="button" type="submit" value="Log in"><br><br>
                
                <div style="font-family: Arial, Helvetica, sans-serif; color: azure">
                    Don't have an account ? <a href="signup.php">Sign up</a>
                </div>
            </form>
        </div>

    </body>
</html>