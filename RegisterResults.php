<html>
    
    <head> 
        <title>Register Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="img/Logo.png" rel="icon">    
    </head>

    <body>
        <?php
            $db = mysqli_connect("localhost", "group29admin", "CellsWatch", "group29");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $checking = "SELECT * FROM User WHERE User.Username = '$_POST[username]'";
            $result = mysqli_query($db, $checking);
            if (mysqli_num_rows($result) == 1) {
                echo "<h4>Registration Failed: Username already taken</h4>\n";
            }
            else {
                $query = "INSERT INTO User VALUES ('$_POST[username]', '$_POST[password]')";
                if (!mysqli_query($db, $query)) {
                    die('Error: ' . mysqli_error($db));
                }
                echo "<h4>1 user added to User</h4>\n";
                echo "<form action='UserPage.php' method='post'>"; 
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='submit' value='Continue to User Page'> </form>";
            }
        ?>
    </body>
</html>