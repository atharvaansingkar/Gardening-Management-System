
<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the ID to be deleted from the form
        $table=$_POST['grain_T'];
        $name = $_POST['grain_name'];

        // Replace with your database connection code
        $conn = mysqli_connect("localhost", "root", "", "gardening_management");

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create and execute the DELETE SQL query
        $sql = "DELETE FROM grains WHERE grain_name = $name";

        if (mysqli_query($conn, $sql)) {
            echo "Grain names $name has been deleted successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
    ?><!DOCTYPE html>
<html>
<head>
    <title>Delete Row by name</title>
</head>
<body>
    <!-- <h1>Delete Row by ID</h1> -->

    

</body>
</html>
