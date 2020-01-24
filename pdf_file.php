<?php
require_once 'main/controller/dbclass.php';
require_once 'vendor/setasign/fpdf/fpdf.php';
$db=new dbclass();$con=$db->Connection();
 $id = base64_decode($_GET['ID']);

    $qry="Select package.*,book_now.*,pricing.lux_final_price,pricing.lux_regular_price,pricing.std_final_price,pricing.std_regular_price,pricing.prm_regular_price,pricing.prm_final_price,pricing.ID as priceID FROM package LEFT JOIN pricing ON pricing.packageID=package.ID LEFT JOIN book_now ON book_now.package_id = package.ID  where package.active='1' and package.ID='".base64_decode($_GET['ID'])."' and book_now.package_id !='' order by package.ID DESC";
  $run = mysqli_query($con,$qry);
  $fetch = mysqli_fetch_assoc($run);
  $userID = $fetch['userID'];
  $tour_facility = json_decode($fetch['tour_facility']);
  if (!empty(isset($fetch['tour_facility']))) 
  {
  		 	 $icon_qry = "Select name,ID from icons where ID IN($tour_facility)";
	  		 $run_icon = mysqli_query($con,$icon_qry);
	  		 $arr =array();
	  		 while($fetch_icon = mysqli_fetch_assoc($run_icon))
	  		 { 
	  		 	 $fetch_icon;
	  		 }

  }	
  /*echo "<pre/>"; print_r($fetch); die();*/

/*function generate_pdf($myfilename , $pdfData){*/
	
	/*$image1 = "img/logo_pdf.jpg";*/
	
	$pdf = new FPDF('p','mm','A4');
	$pdf->AddPage();

	$pdf->SetFont('Arial','B',14);
	/*$pdf->Image($image1, 10, $pdf->GetY(), 85.78);*/
	// $pdf->SetFont('Arial','',12);
	$pdf->Cell(145	,40,'',0,1);
	
	$pdf->SetFont('Arial','B',14);
	$pdf->Cell(10, 5,'INVOICE:',0,0);
	$pdf->Ln(10);
	
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(120,  15, $fetch['slug'],0,0);
	$pdf->Cell(25,   15, 'Invoice No:',0,0);
	$pdf->Cell(34,   15, $fetch['userID'],0,1);


	$pdf->Cell(120	,0,$fetch['from_city'].'-'.$fetch['to_city'] ,0,0);
	$pdf->Cell(25	,0,'Invoice Date:',0,0);
	$pdf->Cell(34	,0,$fetch['travel_date'],0,1);

	$pdf->Cell(120	,15,$fetch['from_city'],0,0);
	$pdf->Cell(13,   15, 'Email:',0,0);
	$pdf->Cell(34,   15, $fetch['email'],0,1);

	$pdf->Cell(120	,0,$fetch['phone'],0,0);
	$pdf->Cell(18,   0, 'User ID:',0,0);
	$pdf->Cell(34,   0, $fetch['userID'],0,1);


	$pdf->Cell(140	,10,'',0,1);
	$pdf->SetFont('Arial','B',12);
	
	$pdf->SetFillColor(0,0,0);
	$pdf->SetTextColor(255,255,255);
	
	$pdf->Cell(130	,10,'Package Name',1,0,'',true);
	
	$pdf->Cell(35	,10,'Tour Facility',1,0,'C',true);
	$pdf->Cell(25	,10,'Price',1,1,'C',true);
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(0,0,0);
	$cellWidth = 130;
	$cellHeight = 7;
	

			$pdf->cell($cellWidth,$cellHeight,$fetch["name"],0);
			$pdf->Cell(35,($cellHeight),$fetch_icon["name"],0,0,'C');
			$pdf->Cell(25,($cellHeight),$fetch["tour_total_price"],0,1,'C');
	
	$pdf->Ln(15);
	$pdf->Cell(120	,8,'',0,0);
	$pdf->SetFont( 'Arial', 'B', 12 );
	$pdf->Cell(45	,5,'Subtotal',1,0);
	$pdf->SetFont( 'Arial', '', 10 );
	$pdf->Cell(25	,5,number_format($fetch['tour_total_price']),1,1,'R');

	$pdf->Cell(120	,5,'',0,0);
	$pdf->SetFont( 'Arial', 'B', 12 );
	$pdf->Cell(45	,5,'Shipping',1,0);
	$pdf->SetFont( 'Arial', '', 10 );
	$pdf->Cell(25	,5,number_format($fetch['']),1,1,'R');

	$pdf->Cell(120	,5,'',0,0);
	$pdf->SetFont( 'Arial', 'B', 12 );
	$pdf->Cell(45	,5,'Total',1,0);
	$pdf->SetFont( 'Arial', 'B', 10 );
	$pdf->Cell(25	,5,number_format($fetch['tour_total_price']),1,1,'R');
	$pdf->Output();
	$filename="pdf_bills/$userID";
	$pdf->Output($filename,'F');
//}
?>