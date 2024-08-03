

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Search by Crop Name</title> -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>

    <div class="">
<?php
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

if (isset($_POST['flowername'])) {
    $name = $_POST['flowername'];

    // Query to retrieve the row based on the provided crop name (use prepared statements)
    $sql = "SELECT * FROM new WHERE flowername = ?";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<section class='text-gray-600 body-font overflow-hidden ml-12'>";
        echo "<div class='container px-5 py-24 '>";
          echo "<div class='lg:w-4/5 mx-auto flex flex-wrap'>";
            echo "<div class='lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0'>";
                // Display the retrieved data
                echo" <div class='flex border-t border-gray-200 py-2'>";
                 echo "<span class='text-gray-500'>Flower Name</span>";
                  echo"<span class='ml-32 text-gray-900'>".$row["flowername"]."</span>";
               echo" </div>";
               echo" <div class='flex border-t border-gray-200 py-2'>";
               echo "<span class='text-gray-500'>User Name</span>";
                echo"<span class='ml-32 text-gray-900'>".$row["name"]."</span>";
             echo" </div>";
      
                echo" <div class='flex border-t border-gray-200 py-2'>";
                 echo "<span class='text-gray-500'>Mobile Number</span>";
                  echo"<span class='ml-32 text-gray-900'>".$row["mobile"]."</span>";
               echo" </div>";
               echo" <div class='flex border-t border-gray-200 py-2'>";
               echo "<span class='text-gray-500'>Email</span>";
                echo"<span class='ml-32 text-gray-900'>".$row["email"]."</span>";
             echo" </div>";
               
               echo" <div class='flex border-t border-gray-200 py-2'>";
               echo "<span class='text-gray-500'>Comment            </span>";
                echo"<span class='ml-32 text-gray-900'>".$row["comment"]."</span>";
             echo" </div>";
           
       
       
            //    echo" <div class='flex'>";
                 
            //       echo"<button class='flex ml-auto text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded'>";echo"Button";echo"</button>";
                 
            //    echo" </div>";
              echo"</div>";
            //  echo "<img alt='ecommerce' class='lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded' src='" . $row["crop_image_url"] . ">";
            echo "</div>";
        echo "</div>";
      echo "</section>";
            }
        } else {
            echo "No data found for flower: $name";
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
</div>

          
</body>
</html>
