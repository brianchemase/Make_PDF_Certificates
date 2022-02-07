<?php
require('fpdf/fpdf.php');


// variables start
	$abstract='lost documents';
	$ob_number='14/05/23/2021';
	$id_no='32676639';
	$description_container='LOSS OF NATIONAL IDENTIFICATION CARD NO';
	$description=$description_container.' '.$id_no;
	$station='Huduma Centre Nandi';
	$client_names="Reinhard Shiwani";
	$client_name=$client_names.' ID No '.$id_no;

// variables
//$name = text to be added, $x= x cordinate, $y = y coordinate, $a = alignment , $f= Font Name, $t = Bold / Italic, $s = Font Size, $r = Red, $g = Green Font color, $b = Blue Font Color
function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
$pdf->SetFont($f,$t,$s);	
$pdf->SetXY($x,$y);
$pdf->SetTextColor($r,$g,$b);
$pdf->Cell(0,10,$text,0,0,$a);	
}

//Create A 4 Landscape page
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetCreator('Brian Anikayi');
// Add background image for PDF
$pdf->Image('obbg.jpg',0,0,220,0);	

//Add a Name to the certificate
AddText($pdf,ucwords($ob_number), 40,70, 'C', 'Helvetica','B',21,3,0,100);
AddText($pdf,ucwords($description), 0,94, 'C', 'Helvetica','B',15,3,0,100);
AddText($pdf,ucwords($station), 0,110, 'C', 'Helvetica','B',16,3,0,100);
AddText($pdf,ucwords($client_name), 78,135, 'L', 'Helvetica','B',14,3,0,100);
//AddText($pdf,($message), 15,120, 'L', 'Helvetica','B',12, 3,0,100);

//AddText($pdf,('DISCLAIMER!! DISCLAIMER!! DISCLAIMER!!'), 0,130, 'C', 'Helvetica','B',18, 3,0,100);
//AddText($pdf,($disclaimer), 7,140, 'L', 'Helvetica','B',8, 3,0,100);
//AddText($pdf,ucwords($date_of_issue), 10,175, 'L', 'Helvetica','B',8, 3,0,100);
//AddText($pdf,ucwords($expery_date), 160,175, 'L', 'Helvetica','B',8, 3,0,100);
//AddText($pdf,ucwords($Refno1), 10,179, 'L', 'Helvetica','B',8, 3,0,100);

$pdf->Output($abstract.".pdf",'I');
?>