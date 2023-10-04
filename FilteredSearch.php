<html>

    <head> 
        <title>Filtered Search</title>
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
        <form action="FilteredSearchResults.php" method="post">
            <?php
                switch ($_POST['Filter_By']) {
                    case "Hero_Name":
                        echo "<select name='search'>";
                        $result = mysqli_query($db, "SELECT * FROM Hero"); 
                        while ($row = mysqli_fetch_array($result)) {  
                            echo "<option value='" . $row['Hero_Name'] . "'>" . $row['Hero_Name'] . "</option>\n";
                        }
                        echo "</select>";
                        break;
                    case "Primary_Weapon_Name":
                        echo "<select name='search'>";
                        $result = mysqli_query($db, "SELECT * FROM Primary_Weapon"); 
                        while ($row = mysqli_fetch_array($result)) {  
                            echo "<option value='" . $row['Primary_Name'] . "'>" . $row['Primary_Name'] . "</option>\n";
                        }
                        echo "</select>";
                        break;
                    case "Total_Cost":
                        echo "<input type='text' name='search' placeholder='Total Cost:'>";
                        break;
                }
            ?>
            <?php
                echo "<input type='hidden' name='Filter_By' value='" . $_POST['Filter_By'] . "'>";
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            ?>
            
            <input type="submit" value="Filter">
        </form>
    </body>
</html>