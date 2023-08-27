<?php
require 'vendor/autoload.php'; // Autoload the dompdf library

use Dompdf\Dompdf;
use Dompdf\Options;

// HTML content for the Money Receipt
$html = "
<!DOCTYPE html>
<html>
<head>
    <style>
        /* Your CSS styles here */
    </style>
</head>
<body>
    <div class='container'>
        <h1>Money Receipt</h1>
        <!-- ... Include the rest of your HTML content here ... -->
    </div>
</body>
</html>
";

// Initialize dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the PDF (output to client)
$dompdf->render();

// Output the generated PDF as a downloadable file
$dompdf->stream('money_receipt.pdf', array('Attachment' => 0));
?>
