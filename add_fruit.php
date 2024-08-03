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
    $fruitName = sanitizeInput($_POST['fruit_name']);
    $fruitType = sanitizeInput($_POST['fruit_type']);
    $fruitColor = sanitizeInput($_POST['fruit_color']);
    $fruitSeason = sanitizeInput($_POST['fruit_season']);
    $fruitSunlight = sanitizeInput($_POST['fruit_sunlight']);
    $fruitWatering = sanitizeInput($_POST['fruit_watering']);
    $fruitHeight = sanitizeInput($_POST['fruit_height']);
    $fruitCareDifficulty = sanitizeInput($_POST['fruit_care_difficulty']);
    $fruitUses = sanitizeInput($_POST['fruit_uses']);
    $fruitImageUrl = sanitizeInput($_POST['fruit_image_url']);

    // Insert data into the database
    $sql = "INSERT INTO fruits (fruit_name, fruit_type, fruit_color, fruit_season, fruit_sunlight, fruit_watering, fruit_height, fruit_care_difficulty, fruit_uses, fruit_image_url)
            VALUES ('$fruitName', '$fruitType', '$fruitColor', '$fruitSeason', '$fruitSunlight', '$fruitWatering', '$fruitHeight', '$fruitCareDifficulty', '$fruitUses', '$fruitImageUrl')";

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
    <title>Fruits Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Fruit Form</h1>
        <form method="post" action="#" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_name">Fruit Name:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_type">Fruit Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_type" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_color">Fruit Color:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_color" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_season">Fruit Season:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_season" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_sunlight">Fruit Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_sunlight" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_watering">Fruit Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_watering" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_height">Fruit Height:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="fruit_height" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_care_difficulty">Fruit Care Difficulty:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="fruit_care_difficulty" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_uses">Fruit Uses:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="fruit_uses" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="fruit_image_url">Fruit Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" name="fruit_image_url" required>
            </div>

            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
