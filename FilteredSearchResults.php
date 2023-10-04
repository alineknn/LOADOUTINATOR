<html>

    <head> 
        <title>Search Results</title>
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
        ?>
        <table>
            <?php
                if ($_POST['Title']) {
                    $preset = mysqli_query($db, "SELECT Preset.Title, Preset.Username, Preset_Has1.Primary_Name, Preset_Has2.Shield_Type, Preset_Has3.Sidearm_Name, Preset_Has4.Hero_Name, Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost FROM Preset, Preset_Has1, Preset_Has2, Preset_Has3, Preset_Has4, Primary_Weapon, Sidearm, Shield WHERE Preset.Title = '$_POST[Title]' AND Preset.Title = Preset_Has1.Title AND Preset.Title = Preset_Has2.Title AND Preset.Title = Preset_Has3.Title AND Preset.Title = Preset_Has4.Title AND Preset_Has1.Primary_Name = Primary_Weapon.Primary_Name AND Preset_Has2.Shield_Type = Shield.Shield_Type AND Preset_Has3.Sidearm_Name = Sidearm.Sidearm_Name");
                    if (mysqli_num_rows($preset) == 0) {
                        echo "No results found";
                    }
                    else {
                        echo "<tr><th>Title</th><th>User</th><th>Hero</th><th>Primary Weapon Name</th><th>Sidearm Name</th><th>Shield Type</th><th>Preset Cost</th></tr>";
                        while ($row = mysqli_fetch_array($preset)) {
                            echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Username'] . "</td><td>" . $row['Hero_Name'] . "</td><td>" . $row['Primary_Name'] . "</td><td>" . $row['Sidearm_Name'] . "</td><td>" . $row['Shield_Type'] . "</td><td>" . $row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] . "</td></tr>";
                        }
                    }
                }
                else if ($_POST['Filter_By']) {
                    switch ($_POST['Filter_By']) {
                        case "Hero_Name":
                            $preset = mysqli_query($db, "SELECT Preset.Title, Preset_Has1.Primary_Name, Preset_Has2.Shield_Type, Preset_Has3.Sidearm_Name, Preset_Has4.Hero_Name, Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost FROM Preset, Preset_Has1, Preset_Has2, Preset_Has3, Preset_Has4, Primary_Weapon, Sidearm, Shield WHERE Preset.Username = '$_POST[username]' AND Preset.Title = Preset_Has1.Title AND Preset.Title = Preset_Has2.Title AND Preset.Title = Preset_Has3.Title AND Preset.Title = Preset_Has4.Title AND Preset_Has1.Primary_Name = Primary_Weapon.Primary_Name AND Preset_Has2.Shield_Type = Shield.Shield_Type AND Preset_Has3.Sidearm_Name = Sidearm.Sidearm_Name AND Preset_Has4.Hero_Name = '$_POST[search]'");
                            if (mysqli_num_rows($preset) == 0) {
                                echo "No results found";
                            }
                            else {
                                echo "<tr><th>Title</th><th>Hero</th><th>Primary Weapon Name</th><th>Sidearm Name</th><th>Shield Type</th><th>Preset Cost</th></tr>";
                                while ($row = mysqli_fetch_array($preset)) {
                                    echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Hero_Name'] . "</td><td>" . $row['Primary_Name'] . "</td><td>" . $row['Sidearm_Name'] . "</td><td>" . $row['Shield_Type'] . "</td><td>" . $row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] . "</td></tr>";
                                }
                            }
                            break;
                        case "Primary_Weapon_Name":
                            $preset = mysqli_query($db, "SELECT Preset.Title, Preset_Has1.Primary_Name, Preset_Has2.Shield_Type, Preset_Has3.Sidearm_Name, Preset_Has4.Hero_Name, Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost FROM Preset, Preset_Has1, Preset_Has2, Preset_Has3, Preset_Has4, Primary_Weapon, Sidearm, Shield WHERE Preset.Username = '$_POST[username]' AND Preset.Title = Preset_Has1.Title AND Preset.Title = Preset_Has2.Title AND Preset.Title = Preset_Has3.Title AND Preset.Title = Preset_Has4.Title AND Preset_Has1.Primary_Name = Primary_Weapon.Primary_Name AND Preset_Has2.Shield_Type = Shield.Shield_Type AND Preset_Has3.Sidearm_Name = Sidearm.Sidearm_Name AND Preset_Has1.Primary_Name = '$_POST[search]'");
                            if (mysqli_num_rows($preset) == 0) {
                                echo "No results found";
                            }
                            else {
                                echo "<tr><th>Title</th><th>Hero</th><th>Primary Weapon Name</th><th>Sidearm Name</th><th>Shield Type</th><th>Preset Cost</th></tr>";
                                while ($row = mysqli_fetch_array($preset)) {
                                    echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Hero_Name'] . "</td><td>" . $row['Primary_Name'] . "</td><td>" . $row['Sidearm_Name'] . "</td><td>" . $row['Shield_Type'] . "</td><td>" . $row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] . "</td></tr>";
                                }
                            }
                            break;
                        case "Total_Cost":
                            $totalCost = mysqli_query($db, "SELECT Preset.Title, Preset_Has1.Primary_Name, Preset_Has2.Shield_Type, Preset_Has3.Sidearm_Name, Preset_Has4.Hero_Name, Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost FROM Preset, Preset_Has1, Preset_Has2, Preset_Has3, Preset_Has4, Primary_Weapon, Sidearm, Shield WHERE Preset.Username = '$_POST[username]' AND Preset.Title = Preset_Has1.Title AND Preset.Title = Preset_Has2.Title AND Preset.Title = Preset_Has3.Title AND Preset.Title = Preset_Has4.Title AND Preset_Has1.Primary_Name = Primary_Weapon.Primary_Name AND Preset_Has2.Shield_Type = Shield.Shield_Type AND Preset_Has3.Sidearm_Name = Sidearm.Sidearm_Name");
                            if (mysqli_num_rows($totalCost) == 0) {
                                echo "No results found";
                            }
                            else {
                                echo "<tr><th>Title</th><th>Hero</th><th>Primary Weapon Name</th><th>Sidearm Name</th><th>Shield Type</th><th>Preset Cost</th></tr>";
                                while ($row = mysqli_fetch_array($totalCost)) {
                                    if ($row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] <= $_POST['search']) {
                                        echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Hero_Name'] . "</td><td>" . $row['Primary_Name'] . "</td><td>" . $row['Sidearm_Name'] . "</td><td>" . $row['Shield_Type'] . "</td><td>" . $row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] . "</td></tr>";
                                    }
                                }
                            }
                            break;
                    }
                }
                else {
                    echo "No Results Found";
                }
            ?>
        </table>
        <?php
            echo "<form action='ExplorePage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Return to Explore Page'> </form>";
    
            echo "<form action='UserPage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Return to User Page'> </form>";
            
            if ($_POST['username'] == "Administrator" && $_POST['password'] == "admin") {
                echo "<form action='Maintenance.php' method='post'>"; 
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
                echo "<input type='submit' value='Go to Maintenance Page'> </form>";
            }
        ?>
    </body>
</html>