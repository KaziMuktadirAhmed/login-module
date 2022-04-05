<?php
    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {
            $query = "INSERT INTO users(username, fullname, email, password) VALUES('$username', '$fullname', '$email', '$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        } else {
            echo "<script>alert(\"Please enter some valid information!\")</script>";
        }
    }

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Sign up page</title>
    </head>

    <body>
        <div id="box">
            <form method="POST">
                <div style="font-size: 20px; margin: 10px; color: white;">Sign up</div>                
                
                <input id="text" type="text" name="fullname" placeholder="fullname" required><br><br>
                <input id="text" type="email" name="email" placeholder="email" required><br><br>
                <input id="text" type="text" name="username" placeholder="username" required><br><br>
                <input id="text" type="password" name="password" placeholder="password" required><br><br>

                <input id="button" type="submit" value="Sign up"><br><br>

                <div style="font-family: Arial, Helvetica, sans-serif; color: azure">
                    Already have an account ? <a href="login.php">Log in</a>
                </div>
            </form>
        </div>

    </body>
</html>