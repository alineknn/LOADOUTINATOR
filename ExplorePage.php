<html>
    <head>
        <meta charset="utf-8">
        <title>Explore Page</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link href='styles.css' rel='stylesheet' type='text/css'>
        <link href='img/Logo.png' rel='icon'>   
        <h2>Explore Page</h2>    
 </head>
    <body>
        <form action="FilteredSearchResults.php" method="post">
            <label for="Title">Search by Preset Title: </label>
            <input type="text" name="Title" id="Title">
            
            <?php
                $db = mysqli_connect("localhost", "group29", "islandmolecule", "group29");
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
                $preset = mysqli_query($db, "SELECT Preset.Title FROM Preset");
                $titles = array();
                while ($row = mysqli_fetch_array($preset)) {
                    array_push($titles, $row['Title']);
                }
            ?>
            <script>
                const tags = <?php echo json_encode($titles); ?>;
                $( "#Title" ).autocomplete(
                    { source: tags }
                    );
            </script>
            <?php 
                echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
                echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            ?>

            <input type="submit" value="Search">
        </form>
    </body>
</html>
