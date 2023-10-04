<html>

    <head> 
        <title>Create Preset</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styles.css" rel="stylesheet" type="text/css">
        <link href="img/Logo.png" rel="icon">    
    </head>

    <body> 
        <div class="box">
        <?php
            $db = mysqli_connect("localhost", "group29", "islandmolecule", "group29");
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
        ?>
        <form action="CreatePreset2.php" method="post">
            <select name="Hero_Name">
                <?php
                    $result = mysqli_query($db, "SELECT * FROM Hero"); 
                    while ($row = mysqli_fetch_array($result)) {  
                        echo "<option value='" . $row['Hero_Name'] . "'>" . $row['Hero_Name'] . "</option>\n";
                    }
                ?>
            </select> 
            <?php
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            ?>
            <input type="submit" value="Continue">
        </form>
        </div>
    </body>
</html>