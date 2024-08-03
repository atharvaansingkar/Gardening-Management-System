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

if (isset($_POST['grain_name'])) {
    $name = $_POST['grain_name']; // Assign the value to $name

    // Query to retrieve the row based on the provided crop name (use prepared statements)
    $sql = "SELECT * FROM grains WHERE grain_name = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
                
                <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-5 py-24 mx-auto">
                  <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
      <?php              echo "<h2 class='text-sm title-font text-gray-500 tracking-widest'>".$row["grain_name"]."</h2>";?>
                      <!-- <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Animated Night Hill Illustrations</h1> -->
                     
                      
                     
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Type</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_type"]."</span>";?>
                      </div>
                      <!-- <div class="flex border-t border-gray-200 py-2"> -->
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Colour</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_color"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Growth period</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_growth_period"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Sunlight</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_sunlight"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Watering</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_watering"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Height</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_height"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Care difficulty</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_care_difficulty"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Uses</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["grain_uses"]."</span>";?>
                      </div>
                      
                      <div class="flex">
                        <!-- <span class="title-font font-medium text-2xl text-gray-900">$58.00</span> -->
                        <?php   // Update form action URL
                
            ?>
                        
                      </div>
                    </div>
                    <?php
echo '<img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="/img/grains.png">';
            }?>

                  </div>
                </div>
              </section>
<?php
    } else {
        echo "Error in preparing the statement: " . $conn->error;
    }
}}

// Close the database connection
$conn->close();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grain Information</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
</body>
</html>

