<?php
// Your OpenWeatherMap API key
//967444f49b5006be6827f034e4a7e71e
    
// $apiKey = "8b7aed44985749649a717c6e35637296";
$apiKey = "967444f49b5006be6827f034e4a7e71e";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather and Air Pollution</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-<your-sha-hash>" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            height: 400px;
            display: flex;
            flex-direction: row;
            margin: 20px;
        }

        #map-container {
            height: 5%;
            width: 40%;
            padding: 10px;
        }

        #info-cards {
            height: 100%;
            width: 40%;
            margin-top: 20px;
            margin-left: 40px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; /* Adjust alignment */
            padding: 10px 10px;
        }

        .info-card {
            width: 48%; /* Adjust card width for two cards in a row */
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .info-card:first-child {
            width: 100%; /* Set width to 100% for the first card */
        }

        .info-card.animate {
            opacity: 1;
            transform: translateY(0);
        }

        @media (min-width: 768px) {
            #map-container {
                height: calc(100vh - 40px);
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div id="map-container"></div>
        <div id="info-cards"></div>
    </div>

    <?php
    echo "<script>const apiKey = '$apiKey';</script>";
    ?>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        let map;

        function initMap() {
            map = L.map('map-container').setView([19.7515, 75.7139], 8);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            map.on('click', onMapClick);
        }

        function onMapClick(e) {
            const { lat, lng } = e.latlng;
            fetchData(lat, lng);
        }

        function fetchData(latitude, longitude) {
            const weatherUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;
            const airPollutionUrl = `https://api.openweathermap.org/data/2.5/air_pollution?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;

            fetch(weatherUrl)
                .then(response => response.json())
                .then(weatherData => {
                    fetch(airPollutionUrl)
                        .then(response => response.json())
                        .then(airPollutionData => {
                            updateUI(weatherData, airPollutionData);
                        })
                        .catch(error => {
                            console.error('Error fetching air pollution data:', error);
                            displayError('Failed to fetch air pollution data. Please try again.');
                        });
                })
                .catch(error => {
                    console.error('Error fetching weather data:', error);
                    displayError('Failed to fetch weather data. Please try again.');
                });
        }

        function updateUI(weatherData, airPollutionData) {
            const infoCardsContainer = document.getElementById('info-cards');

            const cityName = weatherData.name;
            const temperatureCelsius = Math.round(weatherData.main.temp - 273.15);
            const coLevel = airPollutionData.list[0].components.co;
            const noLevel = airPollutionData.list[0].components.no;
            const no2Level = airPollutionData.list[0].components.no2;
            const o3Level = airPollutionData.list[0].components.o3;
            const so2Level = airPollutionData.list[0].components.so2;
            const pm2_5Level = airPollutionData.list[0].components.pm2_5;
            const pm10Level = airPollutionData.list[0].components.pm10;
            const nh3Level = airPollutionData.list[0].components.nh3;

            infoCardsContainer.innerHTML = '';

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <h2>${cityName}</h2>
                        <p>Temperature: ${temperatureCelsius}°C</p>
                    </div>
                `;
            }, 100);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-cloud"></i>
                        <p>CO Level: ${coLevel} mg/m³</p>
                    </div>
                `;
            }, 200);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-wind"></i>
                        <p>NO Level: ${noLevel} µg/m³</p>
                    </div>
                `;
            }, 300);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-smog"></i>
                        <p>NO2 Level: ${no2Level} µg/m³</p>
                    </div>
                `;
            }, 400);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-sun"></i>
                        <p>O3 Level: ${o3Level} µg/m³</p>
                    </div>
                `;
            }, 500);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-cloud-showers-heavy"></i>
                        <p>SO2 Level: ${so2Level} µg/m³</p>
                    </div>
                `;
            }, 600);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-dust"></i>
                        <p>PM2.5 Level: ${pm2_5Level} µg/m³</p>
                    </div>
                `;
            }, 700);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-dumpster-fire"></i>
                        <p>PM10 Level: ${pm10Level} µg/m³</p>
                    </div>
                `;
            }, 800);

            setTimeout(() => {
                infoCardsContainer.innerHTML += `
                    <div class="info-card animate">
                        <i class="fas fa-leaf"></i>
                        <p>NH3 Level: ${nh3Level} µg/m³</p>
                    </div>
                `;
            }, 900);
        }

        function displayError(message) {
            alert(message);
        }

        document.addEventListener('DOMContentLoaded', () => {
            initMap();
        });
    </script>
    
</body>

</html>
