<?php
    session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>

<html>
    <head>
        <title>Authntication</title>
    </head>

    <body>
        <h1>Hello, friends </h1>
        <h2>This is <?php echo $user_data['username'] ?> speaking</h2> 

        <a href="logout.php">logout</a>
        <br>
    </body>
</html>