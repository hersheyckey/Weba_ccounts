<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accountName = $_POST['accountName'];
    $accountNumber = $_POST['accountNumber'];
    $accountCode = $_POST['accountCode'];
    $category = $_POST['category'];
    $currency = $_POST['currency'];
    $accountDetails = $_POST['accountDetails'];
    $accountAlias = $_POST['accountAlias'];

    // Perform database connection and insertion (You need to configure your database connection here)
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO accounts (account_name, account_number, account_code, category, currency, account_details, account_alias)
            VALUES ('$accountName', '$accountNumber', '$accountCode', '$category', '$currency', '$accountDetails', '$accountAlias')";

    if ($conn->query($sql) === TRUE) {
        echo "Account added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
