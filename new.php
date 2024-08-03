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

if (isset($_POST['crop_name'])) {
    $name = $_POST['crop_name']; // Assign the value to $name

    // Query to retrieve the row based on the provided crop name (use prepared statements)
    $sql = "SELECT * FROM cash_crops WHERE crop_name = ?";

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
      <?php              echo "<h2 class='text-sm title-font text-gray-500 tracking-widest'>".$row["crop_name"]."</h2>";?>
                      <!-- <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">Animated Night Hill Illustrations</h1> -->
                     
                      
                     
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Type</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_type"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Season</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_season"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Sunlight</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_sunlight"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Watering</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_watering"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Growing period</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_growing_period"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Yield per hectare</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_yield_per_hectare"]."</span>";?>
                      </div>
                      <div class="flex border-t border-gray-200 py-2">
                        <span class="text-gray-500">Market Price</span>
                        <?php
                        echo "<span class='ml-auto text-gray-900'>".$row["crop_market_price"]."</span>";?>
                      </div>
                      
                      <div class="flex">
                        <!-- <span class="title-font font-medium text-2xl text-gray-900">$58.00</span> -->
                        <?php   // Update form action URL
                echo '<form action="update.php" method="POST">';
                echo "<input type='hidden' value='" . $row['crop_name'] . "' name='crop_name'>";
                echo "<button type='submit' name='submit' class='flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded'>Update</button>";
                echo '</form>';
            }?>
                        
                      </div>
                    </div>
                    <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="/img/cash.jpg">';
                  </div>
                  </div>
                </div>
              </section>
<?php
            
        } else {
            echo "No data found for crop: $name";
        }

        // Close the statement
        $stmt->close();
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
    <title>Crop Information</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
</body>
</html>


