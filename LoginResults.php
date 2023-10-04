<html>

    <head> 
        <title>Login Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="img/Logo.png" rel="icon">    
    </head>

    <body>
        <?php
            $db = mysqli_connect("localhost", "group29", "islandmolecule", "group29");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }

            $query = "SELECT * FROM User WHERE User.Username = '$_POST[username]' AND User.Password = '$_POST[password]'";
            $result = mysqli_query($db, $query);
            if (mysqli_num_rows($result) == 1) {
                echo "<h4>Login successful</h4>\n";
                echo "<form action='UserPage.php' method='post'>"; 
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
                echo "<input type='submit' value='Continue to User Page'> </form>";
            }
            else {
                echo "<h4>Incorrect username or password</h4>\n";
            }
            if (($_POST['username'] == "Administrator") && ($_POST['password'] == "admin")) {
                echo "<form action='Maintenance.php' method='post'>";
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
                echo "<input type='submit' value='Maintenance Page'></form>";
                echo "<h4>List of all created Users:</h4>\n";
                $feedback = mysqli_query($db, "SELECT * FROM User"); 
                while ($row = mysqli_fetch_array($feedback)) {  
                    echo "<p>Username: " . $row['Username'] . " | Password: " . $row['Password'] . "</p>\n";
                }
            }
        ?>
    </body>
</html>