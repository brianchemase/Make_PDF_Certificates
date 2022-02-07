<?php
require('../fpdf/fpdf.php');


// variables start
$name="Reinhard Shiwani";
$date=date('d F, Y');
$exp_date=date('d F, Y', strtotime($date. ' + 1 year'));
$date_of_issue="The validity of this certificate is from ".$date;
$expery_date="This Certificate will expire on: ".$exp_date;
$title="EACC CLEARANCE CERTIFICATE";
$disclaimer="THIS IS A DEMO PROJECT TO THE EACC AND SHOULD NOT BE USED ANYWHERE WITHOUT THE MANDATE OF THE ORIGINAL AUTHOR MR. BRIAN CHEMASE ANIKAYI";

			$org='EACC';
			//echo $dept;
			//the date the service is being offered
			$date_ref=date("Ymd");
			//echo $date;
			// a random number between 1-500k
			$rand=rand(1,500);
			$rand1="BOBO";
			//combine all the department+ the date + a random number to have a unique serial number.
			
			$Refno=$org.$date_ref.$rand;
			$Refno1="Certificate reference no: ".$Refno;

	$message="This is to certify that the above names person has been confirmed to have been cleared with EACC with REF NO: ".$Refno;

// variables
//$name = text to be added, $x= x cordinate, $y = y coordinate, $a = alignment , $f= Font Name, $t = Bold / Italic, $s = Font Size, $r = Red, $g = Green Font color, $b = Blue Font Color
function AddText($pdf, $text, $x, $y, $a, $f, $t, $s, $r, $g, $b) {
$pdf->SetFont($f,$t,$s);	
$pdf->SetXY($x,$y);
$pdf->SetTextColor($r,$g,$b);
$pdf->Cell(0,10,$text,0,0,$a);	
}

//Create A 4 Landscape page
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->SetCreator('Brian Anikayi');
// Add background image for PDF
$pdf->Image('../eacc_format.jpg',0,0,0);	

//Add a Name to the certificate
AddText($pdf,ucwords($title), 0,55, 'C', 'Helvetica','B',38,3,0,100);
AddText($pdf,ucwords($name), 0,100, 'C', 'Helvetica','B',30,3,0,100);
AddText($pdf,($message), 15,120, 'L', 'Helvetica','B',12, 3,0,100);

AddText($pdf,('DISCLAIMER!! DISCLAIMER!! DISCLAIMER!!'), 0,130, 'C', 'Helvetica','B',18, 3,0,100);
AddText($pdf,($disclaimer), 7,140, 'L', 'Helvetica','B',8, 3,0,100);
AddText($pdf,ucwords($date_of_issue), 10,175, 'L', 'Helvetica','B',8, 3,0,100);
AddText($pdf,ucwords($expery_date), 160,175, 'L', 'Helvetica','B',8, 3,0,100);
AddText($pdf,ucwords($Refno1), 10,179, 'L', 'Helvetica','B',8, 3,0,100);

$pdf->Output($Refno.".pdf",'D');
?>