<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $itemPrice = $_POST['itemPrice'];

    // Perform database connection and insertion (You need to configure your database connection here)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO items (item_name, item_description, item_price)
            VALUES ('$itemName', '$itemDescription', '$itemPrice')";

    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
