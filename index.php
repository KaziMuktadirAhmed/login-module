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
        <h1>index.php</h1>
        <a href="logout.php">logout</a>
        
        <br>
        Hello, friends this is <?php echo $user_data['username'] ?> speaking 
    </body>
</html>