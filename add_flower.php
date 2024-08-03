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
    $flowerName = sanitizeInput($_POST['flower_name']);
    $flowerType = sanitizeInput($_POST['flower_type']);
    $flowerColor = sanitizeInput($_POST['flower_color']);
    $flowerFragrance = sanitizeInput($_POST['flower_fragrance']);
    $flowerSeason = sanitizeInput($_POST['flower_season']);
    $flowerSunlight = sanitizeInput($_POST['flower_sunlight']);
    $flowerWatering = sanitizeInput($_POST['flower_watering']);
    $flowerHeight = sanitizeInput($_POST['flower_height']);
    $flowerCareDifficulty = sanitizeInput($_POST['flower_care_difficulty']);
    $flowerUses = sanitizeInput($_POST['flower_uses']);
    $flowerImageUrl = sanitizeInput($_POST['flower_image_url']);

    // Insert data into the database
    $sql = "INSERT INTO flowers (flower_name, flower_type, flower_color, flower_fragrance, flower_season, flower_sunlight, flower_watering, flower_height, flower_care_difficulty, flower_uses, flower_image_url)
            VALUES ('$flowerName', '$flowerType', '$flowerColor', '$flowerFragrance', '$flowerSeason', '$flowerSunlight', '$flowerWatering', '$flowerHeight', '$flowerCareDifficulty', '$flowerUses', '$flowerImageUrl')";

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
    <title>Flowers Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Flower Form</h1>
        <form method="post" action="#" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_name">Flower Name:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_type">Flower Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_type" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_color">Flower Color:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_color" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_fragrance">Flower Fragrance:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_fragrance" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_season">Flower Season:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_season" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_sunlight">Flower Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_sunlight" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_watering">Flower Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_watering" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_height">Flower Height:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="flower_height" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_care_difficulty">Flower Care Difficulty:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="flower_care_difficulty" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_uses">Flower Uses:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="flower_uses" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="flower_image_url">Flower Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" name="flower_image_url" required>
            </div>

            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
