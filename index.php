<?php

$apiKey = "f20b6c098887bb79bd4317c465e6b8ab"; 
$city = "Karachi"; // Default city

if (isset($_POST['city'])) {
    $city = $_POST['city'];
}

$url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

$response = file_get_contents($url);
$data = json_decode($response, true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
</head>
<body style="font-family:Arial; padding:30px;">
    <h1>Simple PHP Weather App</h1>

    <form method="POST">
        <input type="text" name="city" placeholder="Enter city" required>
        <button type="submit">Check Weather</button>
    </form>

    <?php if($data && $data['cod'] == 200): ?>
        <h2>City: <?php echo $data['name']; ?></h2>
        <p>Temperature: <?php echo $data['main']['temp']; ?> °C</p>
        <p>Weather: <?php echo $data['weather'][0]['description']; ?></p>
        <p>Humidity: <?php echo $data['main']['humidity']; ?>%</p>
        <p>Wind Speed: <?php echo $data['wind']['speed']; ?> m/s</p>
    <?php else: ?>
        <p style="color:red;">City not found!</p>
    <?php endif; ?>

</body>
</html>
