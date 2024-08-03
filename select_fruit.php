<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="container mx-auto p-4">
        <form method="post" action="process_fruit.php">
           
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
            <div class="mt-4">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">Submit</button>
            </div>
            
        </form>
    </div>
</body>
</html>