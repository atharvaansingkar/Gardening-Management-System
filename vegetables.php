
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
</head>
<body>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Vegetables</h1>
                <!-- <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p> -->
            </div>
            <button><a href="add_vegetable.php">ADD</a></button>
            <button><a href="delete3.php">DELETE</a></button>
            <button><a href="select_vegetable.php">COMMENTS</a></button>
           
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
            $sql = "SELECT * FROM vegetables";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-lg-3 col-sm-6 wow fadeInUp border-black' data-wow-delay='0.1s'>";
                    echo "<a class='cat-item d-block bg-light text-center rounded p-3' href=''>";
                    echo "<div class='rounded p-4'>";
                    echo "<div class='icon mb-3'>";
                    echo "<img class='img-fluid' src='/img/vegetables.png' alt='Icon'>";
                    echo "</div>";

                    echo "<form action='new3.php' method='POST'>";
                    echo "<input type='hidden' name='vegetable_name' value='" . $row['vegetable_name'] . "'>";
                    echo "<input type='submit' name='submit' value='" . $row['vegetable_name'] . "'></input>";
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
</body>
</html>