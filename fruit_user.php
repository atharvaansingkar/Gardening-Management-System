

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Fruits</h1>
        </div>
        <div class="row g-4">
            <?php
            // Database connection information
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gardening_management";

            // Create a connection to the database
            $conn = new mysqli($servername, $username, $password, $database);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve all rows from the cash_crops table
            $sql = "SELECT * FROM fruits";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-3 col-sm-6 wow fadeInUp border-black' data-wow-delay='0.1s'>";
                    echo "<a class='cat-item d-block bg-light text-center rounded p-3' href=''>";
                    echo "<div class='rounded p-4'>";
                    echo "<div class='icon mb-3'>";
                    echo "<img class='img-fluid' src='/img/fruits.png' alt='Icon'>";
                    echo "</div>";

                    echo "<form action='new2_user.php' method='POST'>";
                    echo "<input type='hidden' name='fruit_name' value='" . $row['fruit_name'] . "'>";
                    echo "<input type='submit' name='submit' value='" . $row['fruit_name'] . "'></input>";
                    echo "</form>";

                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "No data found in the table.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>
</div>



   
    <div class="container mx-auto p-4">
        <form method="post" action="process_form2.php">
            <div class="mb-4">
                <label for="name" class="block text-gray-600 font-bold">Name:</label>
                <input type="text" id="name" name="name" class="rounded-lg border px-3 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="mobile" class="block text-gray-600 font-bold">Mobile Number:</label>
                <input type="text" id="mobile" name="mobile" class="rounded-lg border px-3 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600 font-bold">Email:</label>
                <input type="email" id="email" name="email" class="rounded-lg border px-3 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="fruitname" class="block text-gray-600 font-bold">Fruit Name:</label>
                <select id="fruitname" name="fruitname" class="rounded-lg border px-3 py-2 w-full" required>
                    <option value="" disabled selected>Select a Fruit</option>
                    <?php
// PHP code to fetch crop names from the database
$db_connection = mysqli_connect("localhost", "root", "", "gardening_management");

if (!$db_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT fruit_name FROM fruits";
$result = mysqli_query($db_connection, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['fruit_name'] . "'>" . $row['fruit_name'] . "</option>";
    }
} else {
    echo "<option value='' disabled>No fruits found</option>";
}

// Close the database connection
mysqli_close($db_connection);
?>

                </select>
            </div>
            <div class="mb-4">
                <label for="comment" class="block text-gray-600 font-bold">Comment:</label>
                <textarea id="comment" name="comment" class="rounded-lg border px-3 py-2 w-full" required></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
        </form>
    </div>


</body>
</html>