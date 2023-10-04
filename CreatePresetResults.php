<html>

    <head> 
        <title>Preset Results</title>
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
            //using default user as user page after logging in has not been created yet
            $preset = "INSERT INTO Preset VALUES ('$_POST[Title]', '$_POST[Description]', '$_POST[username]')";
            if (!mysqli_query($db, $preset)) {
                die('Error: ' . mysqli_error($db));
            }
            $userHas = "INSERT INTO User_Has VALUES ('$_POST[username]', '$_POST[Title]')";
            if (!mysqli_query($db, $userHas)) {
                die('Error: ' . mysqli_error($db));
            }
            $presetHas1 = "INSERT INTO Preset_Has1 VALUES ('$_POST[Title]', '$_POST[Primary_Name]')";
            if (!mysqli_query($db, $presetHas1)) {
                die('Error: ' . mysqli_error($db));
            }
            $presetHas2 = "INSERT INTO Preset_Has2 VALUES ('$_POST[Title]', '$_POST[Shield_Type]')";
            if (!mysqli_query($db, $presetHas2)) {
                die('Error: ' . mysqli_error($db));
            }
            $presetHas3 = "INSERT INTO Preset_Has3 VALUES ('$_POST[Title]', '$_POST[Sidearm_Name]')";
            if (!mysqli_query($db, $presetHas3)) {
                die('Error: ' . mysqli_error($db));
            }
            $presetHas4 = "INSERT INTO Preset_Has4 VALUES ('$_POST[Title]', '$_POST[Hero_Name]')";
            if (!mysqli_query($db, $presetHas4)) {
                die('Error: ' . mysqli_error($db));
            }
            /*$presetHas5 = "INSERT INTO Preset_Has5 VALUES ('$_POST[Title]', '$_POST[Ability_Name]')";
            if (!mysqli_query($db, $presetHas5)) {
                die('Error: ' . mysqli_error($db));
            }*/
            echo "<h4>New Preset created</h4>";
            echo "<form action='UserPage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Return to User Page'> </form>";

            if (($_POST['username'] == "Administrator") && ($_POST['password'] == "admin")) {
                echo "<form action='Maintenance.php' method='post'>";
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
                echo "<input type='submit' value='Maintenance Page'></form>";
                echo "<h4>List of elements in User_Has relation table: </h4>";
                $feedback = mysqli_query($db, "SELECT * FROM User_Has"); 
                while ($row = mysqli_fetch_array($feedback)) {  
                    echo "<p>Username: " . $row['Username'] . " | Title: " . $row['Title'] . "</p>\n";
                }
                echo "<h4>List of elements in Preset table: </h4>";
                $feedback1 = mysqli_query($db, "SELECT * FROM Preset"); 
                while ($row = mysqli_fetch_array($feedback1)) {  
                    echo "<p>Title: " . $row['Title'] . " | Description: " . $row['Description'] . " | Username: " . $row['Username'] . "</p>\n";
                }
                echo "<h4>List of elements in Preset_Has1 relation table: </h4>";
                $feedback2 = mysqli_query($db, "SELECT * FROM Preset_Has1"); 
                while ($row = mysqli_fetch_array($feedback2)) {  
                    echo "<p>Title: " . $row['Title'] . " | Primary_Name: " . $row['Primary_Name'] . "</p>\n";
                }
                echo "<h4>List of elements in Preset_Has2 relation table: </h4>";
                $feedback3 = mysqli_query($db, "SELECT * FROM Preset_Has2"); 
                while ($row = mysqli_fetch_array($feedback3)) {  
                    echo "<p>Title: " . $row['Title'] . " | Shield_Type: " . $row['Shield_Type'] . "</p>\n";
                }
                echo "<h4>List of elements in Preset_Has3 relation table: </h4>";
                $feedback4 = mysqli_query($db, "SELECT * FROM Preset_Has3"); 
                while ($row = mysqli_fetch_array($feedback4)) {  
                    echo "<p>Title: " . $row['Title'] . " | Sidearm_Name: " . $row['Sidearm_Name'] . "</p>\n";
                }
                echo "<h4>List of elements in Preset_Has4 relation table: </h4>";
                $feedback5 = mysqli_query($db, "SELECT * FROM Preset_Has4"); 
                while ($row = mysqli_fetch_array($feedback5)) {  
                    echo "<p>Title: " . $row['Title'] . " | Hero_Name: " . $row['Hero_Name'] . "</p>\n";
                }
            }
        ?>
    </body>
</html>