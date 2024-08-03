<?php
session_start(); // Start the session

$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "gardening_management"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['crop_name'], $_POST['new_crop_type'], $_POST['new_crop_season'], $_POST['new_crop_sunlight'], $_POST['new_crop_watering'], $_POST['new_crop_growing_period'], $_POST['new_crop_yield_per_hectare'], $_POST['new_crop_market_price'], $_POST['new_crop_image_url'])) {
    $name = $_POST['crop_name'];
    $newCropType = $_POST['new_crop_type'];
    $newCropSeason = $_POST['new_crop_season'];
    $newCropSunlight = $_POST['new_crop_sunlight'];
    $newCropWatering = $_POST['new_crop_watering'];
    $newCropGrowingPeriod = $_POST['new_crop_growing_period'];
    $newCropYieldPerHectare = $_POST['new_crop_yield_per_hectare'];
    $newCropMarketPrice = $_POST['new_crop_market_price'];
    $newCropImageUrl = $_POST['new_crop_image_url'];

    // Update data in the database using a prepared statement
    $sql = "UPDATE cash_crops SET crop_type=?, crop_season=?, crop_sunlight=?, crop_watering=?, crop_growing_period=?, crop_yield_per_hectare=?, crop_market_price=?, crop_image_url=? WHERE crop_name=?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssdss", $newCropType, $newCropSeason, $newCropSunlight, $newCropWatering, $newCropGrowingPeriod, $newCropYieldPerHectare, $newCropMarketPrice, $newCropImageUrl, $name);
        $stmt->execute();
        $stmt->close();

        echo "Data updated successfully.";
    } else {
        echo "Error in preparing the statement: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Crop Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Update Crop Information</h1>
        <form method="post" class="bg-white p-4 rounded-md shadow-md">
            <input type="hidden" name="crop_name" value="<?php echo $_POST['crop_name']; ?>">
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_type">New Crop Type:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" id="new_crop_type" name="new_crop_type" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_season">New Crop Season:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" id="new_crop_season" name="new_crop_season" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_sunlight">New Crop Sunlight:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" id="new_crop_sunlight" name="new_crop_sunlight" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_watering">New Crop Watering:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" id="new_crop_watering" name="new_crop_watering" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_growing_period">New Crop Growing Period:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="text" id="new_crop_growing_period" name="new_crop_growing_period" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_yield_per_hectare">New Crop Yield per Hectare:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" id="new_crop_yield_per_hectare" name="new_crop_yield_per_hectare" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_market_price">New Crop Market Price:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="number" step="0.01" id="new_crop_market_price" name="new_crop_market_price" required>
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold" for="new_crop_image_url">New Crop Image URL:</label>
                <input class="w-full border border-gray-300 p-2 rounded" type="file" id="new_crop_image_url" name="new_crop_image_url" required>
            </div>
            
            <button class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700 cursor-pointer" type="submit">Update Crop Information</button>
        </form>
    </div>
</body>
</html>

