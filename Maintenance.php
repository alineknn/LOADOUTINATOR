<!doctype html>
<html lang="en">
    <?php
        if ($_POST['username'] != "Administrator" && $_POST['password'] != "admin") {
            echo "You do not have permission to view this page.";
            echo "<a href='LoginPage.html'>Login Page</a>";
        }
        else {
            echo "<head> 
                <title>Maintenance</title>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='styles.css' rel='stylesheet' type='text/css'>
                <link href='img/Logo.png' rel='icon'>    
                </head>";
            echo "<body>
                <h1>Maintenance Page</h1>
                <hr>
                <a href='LandingPage.html'>Landing Page</a>
                <br></br>
                <a href='LoginPage.html'>Login Page</a>
                <br></br>
                <a href='RegisterPage.html'>Register Page</a>
                <br></br>
                <a href='MapPage.php'>Map Page</a>
                <br></br>";
            echo "<form action='UserPage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='TEST'>";
            echo "<input type='submit' value='Go to User Page (Using Default user TEST)'> </form>";

            echo "<br></br><form action='ExplorePage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Go to Explore Page'> </form>";

            echo "<br></br><form action='AdminPage.php' method='post'>"; 
            echo "<input type='hidden' name='username' value='" . $_POST['username'] . "'>";
            echo "<input type='hidden' name='password' value='" . $_POST['password'] . "'>";
            echo "<input type='submit' value='Go to Admin Page'> </form></body>";
        }
    ?>
</html>