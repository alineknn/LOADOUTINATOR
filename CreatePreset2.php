<html>

    <head> 
        <title>Create Preset 2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="img/Logo.png" rel="icon">    
    </head>


    <div class="box">
    <body>
        <?php
            $db = mysqli_connect("localhost", "group29", "islandmolecule", "group29");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        ?>

        <form action="CreatePresetResults.php" method="post">
            <select name="Primary_Name">
                <?php //none or 1
                    $result = mysqli_query($db, "SELECT * FROM Primary_Weapon"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Primary_Name'] . "'>" . $row['Primary_Name'] . " | " . $row['Cost'] . "</option>\n";
                    }
                ?>
            </select>

            <select name="Sidearm_Name">
                <?php
                    $result = mysqli_query($db, "SELECT * FROM Sidearm"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Sidearm_Name'] . "'>" . $row['Sidearm_Name'] . " | " . $row['Cost'] . "</option>\n";
                    }
                ?>
            </select>

            <select name="Shield_Type">
                <?php
                    $result = mysqli_query($db, "SELECT * FROM Shield"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Shield_Type'] . "'>" . $row['Shield_Type'] . " | " . $row['Shield_Cost'] . "</option>\n";
                    }
                ?>
            </select><br><br>

            <!-- Ability relations will be added later
            <select name="BasicAbility" multiple size="2"> 
                <?php //need to populate Hero-Has relation table and Ability tables. 'Hero' comes from earlier selected option
                    /*$result = mysqli_query($db, "SELECT * FROM Basic_Ability WHERE Hero_Has.Hero_Name == '$_POST[Hero_Name]' AND Basic_Ability.Ability_Name == Hero_Has.Ability_Name"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Ability_Name'] . "'>" . $row['Ability_Name'] . " | " . $row['Cost'] . "</option>\n";
                    }*/
                ?>
            </select>

            <select name="UltimateAbility">
                <?php
                    /*$result = mysqli_query($db, "SELECT * FROM Ultimate_Ability WHERE Hero_Has.Ability_Name == Ultimate_Ability.Ability_Name"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Ability_Name'] . "'>" . $row['Ability_Name'] . "</option>\n";
                    }*/
                ?>
                <option value="NoUltimate">No Ultimate</option>
            </select> -->

            <h2>Preset name:</h2><br>
            <input type="text" name="Title"><br><br>
            <h2>Description: </h2><br>
            <input type="text" name="Description"><br><br>
            
            <?php
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='Hero_Name' value='" . $_POST['Hero_Name'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            ?>
            <input type="submit" value="Create Preset">
        </form>
        </div>
    </body>
</html>

