<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the crop name to be deleted from the form
        $name = $_POST['name'];

        // Replace with your database connection code
        $conn = mysqli_connect("localhost", "root", "", "gardening_management");

        // Check if the connection was successful
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Use prepared statements to prevent SQL injection
        $sql = "DELETE FROM grains WHERE grain_name = ?";
        
        // Create a prepared statement
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            // Bind the parameter
            mysqli_stmt_bind_param($stmt, "s", $name);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Grain name '$name' has been deleted successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } 
        
        else 
        {
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Grain</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Delete Grain</h1>
        <form method="POST" action="#" class="bg-white p-4 rounded-md shadow-md">
            <div class="md:flex md:space-x-4">
                <div class="md:w-1/2">
                    <input class="w-full px-3 py-2 border rounded" type="text" name="name" placeholder="Grain name">
                </div>
                <div class="md:w-1/2">
                    <input class="w-full bg-blue-500 text-white px-3 py-2 rounded hover:bg-blue-700 cursor-pointer" type="submit" value="Delete">
                </div>
            </div>
        </form>
    </div>
</body>
</html>

