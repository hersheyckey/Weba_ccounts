<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['customerEmail'];
    $customerPhone = $_POST['customerPhone'];
    $companyName = $_POST['companyName'];
    $companyAddress = $_POST['companyAddress'];

    // Perform database connection and insertion (You need to configure your database connection here)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO customers (customer_name, customer_email, customer_phone, company_name, company_address)
            VALUES ('$customerName', '$customerEmail', '$customerPhone', '$companyName', '$companyAddress')";

    if ($conn->query($sql) === TRUE) {
        echo "Customer information submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
