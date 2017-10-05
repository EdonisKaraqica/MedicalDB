

<?php 
//require 'C:/xampp/htdocs/FPDF/fpdf.php';
require('pdf_raporti.php');
$pdf = new createPDF(
            $_POST
        //$_POST['first_name'],   // html text to publish
    
        /*$_POST['last_name'],  // article title
        $_POST['gender'],    // article URL
        $_POST['mobile'], // author name
        $_POST['dob'],
        $_POST['mobile'],
        $_POST['email'],    
        time()
          */
    );
    $pdf->run();


     $filePath = "myPdf.pdf";
    $pdf=new FPDF('p');
    $pdf->Output($filePath,'I');





    /////////////
    
    
     


?>


