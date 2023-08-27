<?php
require 'connect_to_mongodb.php'; // Include the MongoDB connection file

// Retrieve form data
$receivedFrom = $_POST['receivedFrom'];
$receiptAmount = (int)$_POST['receiptAmount'];
$receiptMethod = $_POST['receiptMethod'];
$receiptDate = $_POST['receiptDate'];

// Insert data into MongoDB collection
$insertResult = $collection->insertOne([
    'received_from' => $receivedFrom,
    'amount' => $receiptAmount,
    'payment_method' => $receiptMethod,
    'receipt_date' => $receiptDate
]);

if ($insertResult->getInsertedCount() === 1) {
    echo "Receipt submitted successfully";
} else {
    echo "Error: Unable to insert data";
}
?>
