<html>
    <?php
        if ($_POST['username'] != "Administrator" && $_POST['password'] != "admin") {
            echo "You do not have permission to view this page.";
            echo "<a href='LoginPage.html'>Login Page</a>";
        }
        else {
            $db = mysqli_connect("localhost", "group29admin", "CellsWatch", "group29");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            echo "<head> 
                <title>Admin</title>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='styles.css' rel='stylesheet' type='text/css'>
                <link href='img/Logo.png' rel='icon'>    
                </head>";
            echo "<body>
                <h1>Admin Page</h1>
                <hr>";
            echo "<form action='Maintenance.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Go to Maintenance Page'> </form>";

            echo "<h4>List of all created Users:</h4>";
            $feedbac = mysqli_query($db, "SELECT * FROM User"); 
            while ($row = mysqli_fetch_array($feedbac)) {  
                echo "<p>Username: " . $row['Username'] . " | Password: " . $row['Password'] . "</p>\n";
            }
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
            echo "</body>";
        }
    ?>
</html>