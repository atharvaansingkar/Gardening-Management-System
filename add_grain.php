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
    $grainName = sanitizeInput($_POST['grain_name']);
    $grainType = sanitizeInput($_POST['grain_type']);
    $grainColor = sanitizeInput($_POST['grain_color']);
    $grainGrowthPeriod = sanitizeInput($_POST['grain_growth_period']);
    $grainSunlight = sanitizeInput($_POST['grain_sunlight']);
    $grainWatering = sanitizeInput($_POST['grain_watering']);
    $grainHeight = sanitizeInput($_POST['grain_height']);
    $grainCareDifficulty = sanitizeInput($_POST['grain_care_difficulty']);
    $grainUses = sanitizeInput($_POST['grain_uses']);
    $grainImageUrl = sanitizeInput($_POST['grain_image_url']);

    // Insert data into the database
    $sql = "INSERT INTO grains (grain_name, grain_type, grain_color, grain_growth_period, grain_sunlight, grain_watering, grain_height, grain_care_difficulty, grain_uses, grain_image_url)
            VALUES ('$grainName', '$grainType', '$grainColor', '$grainGrowthPeriod', '$grainSunlight', '$grainWatering', '$grainHeight', '$grainCareDifficulty', '$grainUses', '$grainImageUrl')";

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
    <title>Grains Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Grain Form</h1>
        <form method="post" action="#" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_name">Grains Name:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_type">Grains Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_type" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_color">Grains Color:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_color" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_growth_period">Grains Growth Period:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_growth_period" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_sunlight">Grains Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_sunlight" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_watering">Grains Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_watering" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_height">Grains Height:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="grain_height" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_care_difficulty">Grains Care Difficulty:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="grain_care_difficulty" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_uses">Grains Uses:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="grain_uses" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grain_image_url">Grains Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" name="grain_image_url" required>
            </div>

            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
