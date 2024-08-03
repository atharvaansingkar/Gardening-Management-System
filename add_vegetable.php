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
    $vegetableName = sanitizeInput($_POST['vegetable_name']);
    $vegetableType = sanitizeInput($_POST['vegetable_type']);
    $vegetableColor = sanitizeInput($_POST['vegetable_color']);
    $vegetableSeason = sanitizeInput($_POST['vegetable_season']);
    $vegetableSunlight = sanitizeInput($_POST['vegetable_sunlight']);
    $vegetableWatering = sanitizeInput($_POST['vegetable_watering']);
    $vegetableHeight = sanitizeInput($_POST['vegetable_height']);
    $vegetableCareDifficulty = sanitizeInput($_POST['vegetable_care_difficulty']);
    $vegetableUses = sanitizeInput($_POST['vegetable_uses']);
    $vegetableImageUrl = sanitizeInput($_POST['vegetable_image_url']);

    // Insert data into the database
    $sql = "INSERT INTO vegetables (vegetable_name, vegetable_type, vegetable_color, vegetable_season, vegetable_sunlight, vegetable_watering, vegetable_height, vegetable_care_difficulty, vegetable_uses, vegetable_image_url)
            VALUES ('$vegetableName', '$vegetableType', '$vegetableColor', '$vegetableSeason', '$vegetableSunlight', '$vegetableWatering', '$vegetableHeight', '$vegetableCareDifficulty', '$vegetableUses', '$vegetableImageUrl')";

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
    <title>Vegetables Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold text-center mb-4">Vegetable Form</h1>
        <form method="post" action="#" class="bg-white p-8 rounded-lg shadow-md">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_name">Vegetable Name:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_name" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_type">Vegetable Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_type" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_color">Vegetable Color:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_color" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_season">Vegetable Season:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_season" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_sunlight">Vegetable Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_sunlight" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_watering">Vegetable Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_watering" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_height">Vegetable Height:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" name="vegetable_height" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_care_difficulty">Vegetable Care Difficulty:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="vegetable_care_difficulty" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_uses">Vegetable Uses:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" name="vegetable_uses" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="vegetable_image_url">Vegetable Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" name="vegetable_image_url" required>
            </div>

            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
