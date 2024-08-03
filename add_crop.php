<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gardening_management';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to safely sanitize input
function sanitizeInput($input) {
    global $conn;
    return $conn->real_escape_string($input);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cropName = sanitizeInput($_POST['crop_name']);
    $cropType = sanitizeInput($_POST['crop_type']);
    $cropSeason = sanitizeInput($_POST['crop_season']);
    $cropSunlight = sanitizeInput($_POST['crop_sunlight']);
    $cropWatering = sanitizeInput($_POST['crop_watering']);
    $cropGrowingPeriod = sanitizeInput($_POST['crop_growing_period']);
    $cropYieldPerHectare = sanitizeInput($_POST['crop_yield_per_hectare']);
    $cropMarketPrice = sanitizeInput($_POST['crop_market_price']);
    $cropImageUrl = sanitizeInput($_POST['crop_image_url']);

    // Insert data into the database
    $sql = "INSERT INTO cash_crops (crop_name, crop_type, crop_season, crop_sunlight, crop_watering, crop_growing_period, crop_yield_per_hectare, crop_market_price, crop_image_url)
            VALUES ('$cropName', '$cropType', '$cropSeason', '$cropSunlight', '$cropWatering', '$cropGrowingPeriod', '$cropYieldPerHectare', '$cropMarketPrice', '$cropImageUrl')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cash Crop Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Cash Crop Form</h1>
        <form method="post" action="#" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_name">Crop Name:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_type">Crop Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_type" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_season">Crop Season:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_season" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_sunlight">Crop Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_sunlight" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_watering">Crop Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_watering" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_growing_period">Crop Growing Period:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="crop_growing_period" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_yield_per_hectare">Crop Yield per Hectare:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="crop_yield_per_hectare" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_market_price">Crop Market Price:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="crop_market_price" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="crop_image_url">Crop Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" name="crop_image_url" required>
            </div>

            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
