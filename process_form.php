<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $cropname = $_POST["cropname"];
    $comment = $_POST["comment"];

    // Connect to the database
    $db_connection = mysqli_connect("localhost", "root", "", "gardening_management");

    // Insert data into the 'new' table
    $insert_query = "INSERT INTO new (name, mobile, email, cropname, comment) VALUES ('$name', '$mobile', '$email', '$cropname', '$comment')";
    
    if (mysqli_query($db_connection, $insert_query)) {
        echo "Data has been successfully inserted into the 'new' table.";
    } else {
        echo "Error: " . mysqli_error($db_connection);
    }

    // Close the database connection
    mysqli_close($db_connection);
}
?>
