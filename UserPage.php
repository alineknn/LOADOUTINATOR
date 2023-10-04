<html>
    <body>
        <head>
            <link href="styles.css" rel="stylesheet" type="text/css">
            <link href='img/Logo.png' rel='icon'>       
        </head>
        <?php
            echo "<h2>" . $_POST['username'] . "</h2>";
        ?>
        <form action="CreatePreset.php" method="post">
            <?php
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='". $_POST['password'] . "'>";
            ?>
            <input type="submit" value="Create Preset">
        </form>
        <form action="ExplorePage.php" method="post">
            <?php
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='". $_POST['password'] . "'>";
            ?>
            <input type="submit" value="Explore Page">
        </form>

        <h2>Filter Presets by:</h2>
        <form action="FilteredSearch.php" method="post">
            <select name="Filter_By">
                <option value="Hero_Name">Hero</option>
                <option value="Primary_Weapon_Name">Primary Weapon Name</option>
                <option value="Total_Cost">Total Preset Cost</option>
            </select> 
            <?php
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            ?>
            <input type="submit" value="Continue">
        </form>

        <br><h2>Presets:</h2><br>
        <table>
            <?php
                $db = mysqli_connect("localhost", "group29", "islandmolecule", "group29");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                echo "<tr><th>Title</th><th>Hero</th><th>Primary Weapon Name</th><th>Sidearm Name</th><th>Shield Type</th><th>Preset Cost</th></tr>";
                $preset = mysqli_query($db, "SELECT Preset.Title, Preset_Has1.Primary_Name, Preset_Has2.Shield_Type, Preset_Has3.Sidearm_Name, Preset_Has4.Hero_Name, Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost FROM Preset, Preset_Has1, Preset_Has2, Preset_Has3, Preset_Has4, Primary_Weapon, Sidearm, Shield WHERE Preset.Username = '$_POST[username]' AND Preset.Title = Preset_Has1.Title AND Preset.Title = Preset_Has2.Title AND Preset.Title = Preset_Has3.Title AND Preset.Title = Preset_Has4.Title AND Preset_Has1.Primary_Name = Primary_Weapon.Primary_Name AND Preset_Has2.Shield_Type = Shield.Shield_Type AND Preset_Has3.Sidearm_Name = Sidearm.Sidearm_Name");
                while ($row = mysqli_fetch_array($preset)) {
                    echo "<tr><td>" . $row['Title'] . "</td><td>" . $row['Hero_Name'] . "</td><td>" . $row['Primary_Name'] . "</td><td>" . $row['Sidearm_Name'] . "</td><td>" . $row['Shield_Type'] . "</td><td>" . $row['Primary_Weapon.Cost + Sidearm.Cost + Shield.Shield_Cost'] . "</td></tr>";
                }
            ?>
        </table>
    </body>
</html>