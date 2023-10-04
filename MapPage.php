<!DOCTYPE html>
<html lang="en">
    <head>
        <base target="_top">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Map Page</title>
        
        <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
        <link href='styles.css' rel='stylesheet' type='text/css'>
        <link href='img/Logo.png' rel='icon'>   
        <h2>Map Page</h2>
    </head>
    <body>
        <div class="box">
        <div id="map" style="width: 600px; height: 400px;" ></div></div>
        <?php
            $result = file_get_contents("https://api64.ipify.org?format=json");
            $result = explode('"', $result);
            $ip = $result[3];

            $response = file_get_contents("https://ipinfo.io/" . $ip . "?token=5214cf9fe2eca1");
            $response = explode('"', $response);
            $loc = $response[23];
            $loc = explode(',', $loc);
            $lat = $loc[0];
            $long = $loc[1];
        ?>
        <script> 
            const lat = <?php echo $lat; ?>;
            const long = <?php echo $long; ?>;
            const map = L.map('map').setView([lat, long], 13);

            const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map)

            var marker = L.marker([lat, long]).addTo(map);
            marker.bindPopup("<b>IP Address:</b><br><?php echo $ip; ?>").openPopup();
        </script>
    </body>
</html>