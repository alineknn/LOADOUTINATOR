<!DOCTYPE html>
<html>
    <body>
        <h1>My first PHP page</h1>
        <?php
            $result = file_get_contents("https://api64.ipify.org?format=json");
            $result = explode('"', $result);
            $ip = $result[3];
            echo $ip;
            $response = file_get_contents("https://ipinfo.io/212.201.44.249?token=5214cf9fe2eca1");
            $response = explode('"', $response);
            $loc = $response[23];
            $loc = explode(',', $loc);
            echo $loc[0];
            echo $loc[1];
        ?>
    </body>
</html>
