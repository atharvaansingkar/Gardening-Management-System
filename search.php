<!DOCTYPE html>
<html>
<head>
    <title>Crop Data</title>
</head>
<body>
    <h1>Crop Data</h1>
    
    <?php
    // Retrieve user-selected crop name and table name
    $selected_crop_name = $_POST['crop_name'];
    $selected_table_name = $_POST['crop_type'];
    

    // Replace with your database connection code
    $conn = mysqli_connect("localhost", "root", "", "gardening_management");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch data for the selected crop name from the selected table
    $sql = "SELECT * FROM $selected_table_name WHERE crop_name = '$selected_crop_name'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "Crop Name: " . $selected_crop_name. "<br>";
        echo "Crop Type: " . $row['crop_type'] . "<br>";
        echo "Crop Season: " . $row['crop_season'] . "<br>";
        echo "Crop Sunlight: " . $row['crop_sunlight'] . "<br>";
        echo "Crop Watering: " . $row['crop_watering'] . "<br>";
        echo "Growing Period: " . $row['crop_growing_period'] . "<br>";
        echo "Yield per hectare: " . $row['crop_yield_per_hectare'] . "<br>";
        echo "Market price: " . $row['crop_maeket_price'] . "<br>";
    } else {
        echo "Crop data not found for the selected crop name.";
    }

    mysqli_close($conn);
    ?>

    <br>
    <a href="index2.php">Back to Selection</a>
</body>
</html>
