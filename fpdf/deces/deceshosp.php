<?php
require('deces.php');
$pdf = new deces();$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(16);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$ID = $_GET["uc"];
// $pdf->EAN13(15,50,$ID,$h=6,$w=.35);$pdf->EAN13(150,50,time(),$h=6,$w=.35);
// $pdf->EAN13(15,144,$ID,$h=6,$w=.35);$pdf->EAN13(150,144,time(),$h=6,$w=.35);
$pdf->SetFont('Arial','B',9);
$pdf->mysqlconnect();
$query = "SELECT * FROM deceshosp where id='".$ID."'  ";
$resultat=mysql_query($query);
$pdf->SetFont('Arial','B',08);
while($row=mysql_fetch_object($resultat))
{
	
	//partie administrative***//
	$pdf->SetFont('Arial','B',08);
	$pdf->SetXY(64,26.5);$pdf->Write(0,'ETABLISSEMENT DE SANTE : '.$pdf->nbrtostring('structure','id',intval(trim($row->STRUCTURED)),'structure'));
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(255,0,0);
	$pdf->SetXY(45,49.5);$pdf->Write(0,html_entity_decode(utf8_decode($pdf->nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'))));
	$pdf->SetXY(43,53.5);$pdf->Write(0,html_entity_decode(utf8_decode($pdf->nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'))));
	$pdf->SetXY(28,57);$pdf->Write(0,$row->NOM);
	$pdf->SetXY(71,57);$pdf->Write(0,$row->PRENOM);
	$pdf->SetXY(29,64);  $pdf->Write(0,$row->SEX);
	$pdf->SetXY(36,68.7);$pdf->Write(0,$row->FILSDE);
	$pdf->SetXY(76,68.7);$pdf->Write(0,$row->ETDE);
	
	$pdf->SetXY(50,72.7);$pdf->Write(0,$pdf->dateUS2FR($row->DATENAISSANCE));
	$pdf->SetXY(87,72.7);$pdf->Write(0,html_entity_decode(utf8_decode($pdf->nbrtostring('com','IDCOM',$row->COMMUNE,'COMMUNE'))));
	$pdf->SetXY(118,72.7);$pdf->Write(0,html_entity_decode(utf8_decode($pdf->nbrtostring('WIL','IDWIL',$row->WILAYA,'WILAYAS'))));
	$pdf->SetXY(22,79.7);$pdf->Write(0,html_entity_decode(utf8_decode($row->ADRESSE)));
	
	
	$pdf->SetXY(47,83);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'));
	$pdf->SetXY(90,83);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAR,'WILAYAS'));
	
	
	$pdf->SetXY(38,87);$pdf->Write(0,$pdf->dateUS2FR($row->DINS));
	
	if ($row->Days >= 365) 
	{
	$pdf->SetXY(88,85+2.5);$pdf->Write(0,$row->Years);
	$pdf->SetXY(112.5,88+3);$pdf->Write(0,'***');
	$pdf->SetXY(127.5,88+2.5);$pdf->Write(0,'***');
	}
	if ($row->Days <= 30) 
	{
	$pdf->SetXY(88,85+3.5);$pdf->Write(0,'***');
	$pdf->SetXY(112.5,88+3);$pdf->Write(0,'***');
	$pdf->SetXY(127.5,88+2.5);$pdf->Write(0,$row->Days);
	}
	
	if ($row->Days > 30  and  $row->Days < 365 ) 
	{
	$pdf->SetXY(88,85+3.5);$pdf->Write(0,'***');
	$pdf->SetXY(112.5,88+2.5);$pdf->Write(0,$row->Months);
	$pdf->SetXY(127.5,88+3);$pdf->Write(0,'***');
	}
	
	$pdf->SetXY(62,95);$pdf->Write(0,$pdf->nbrtostring('profession','id',$row->Profession,'Profession'));
	
	//LIEU DU DECES
	
	$pdf->SetXY(24,101);$pdf->Cell(4,2,"",1,1,'C');  $pdf->SetXY(24+23,101);$pdf->Cell(4,2,"",1,1,'C');   $pdf->SetXY(24+62,101);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(24,105);$pdf->Cell(4,2,"",1,1,'C');  $pdf->SetXY(24+23,105);$pdf->Cell(4,2,"",1,1,'C');
	
	switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(24,102);$pdf->Write(0,'X');
				break;
				}
			case 'VP':
				{
				$pdf->SetXY(24,106);$pdf->Write(0,"X");
				break;
				}
			case 'AAP':
				{
				$pdf->SetXY(24+23,106);$pdf->Write(0,"X");
	            $pdf->SetXY(24+23+25,106);$pdf->Write(0,$row->AUTRES);
				break;
				}
			case 'SSP':
				{
	             $pdf->SetXY(24+23,102);$pdf->Write(0,"X");
				break;
				}
			case 'SSPV':
				{
				$pdf->SetXY(24+62,102);$pdf->Write(0,"X");
				break;
				}		
		}
		
		
	//date et heure du deces 	
	$pdf->SetXY(145,61.5);$pdf->Write(0,$pdf->dateUS2FR($row->DINS));
	$pdf->SetXY(145,67.5);$pdf->Write(0,$row->HINS);
    
	
	//CAUSES DECES
	$pdf->SetXY(143,78.5);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(143,81.5+3);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(143,84.5+6);$pdf->Cell(4,2,"",1,1,'C'); 
	switch($row->CD)  
		{
			case 'CN':
				{
				$pdf->SetXY(143,78.5);$pdf->Cell(4,2,"X",1,1,'C');
				break;
				}
			case 'CV':
				{
				$pdf->SetXY(143,81.5+3);$pdf->Cell(4,2,"X",1,1,'C');
				break;
				}
			case 'CI':
				{
				$pdf->SetXY(143,84.5+6);$pdf->Cell(4,2,"X",1,1,'C'); 
				break;
				}			
		}

	$pdf->SetXY(144,98);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(144,104);$pdf->Write(0,$pdf->dateUS2FR($row->DINS));
	$pdf->SetXY(145,108+5);$pdf->Cell(35,5,$row->MEDECINHOSPIT,0,1,'C');
    $pdf->SetXY(160,145-15);$pdf->Cell(35,5,html_entity_decode(utf8_decode("N°: ")).$row->STRUCTURED."/".$row->id,0,1,'C');
   
   //Signalement mÈdico-légal- A remplir par le médecin (cocher la case adéquate)
	$pdf->SetXY(27,116.7+11.5);$pdf->Cell(3,2,"",1,1,'C');
	$pdf->SetXY(110,116.7+11.5);$pdf->Cell(3,2,"",1,1,'C');
	if ($row->OMLI=='1'){$pdf->SetXY(27,116.7+11.5);$pdf->Write(0,"X");}
	if ($row->MIEC=='1'){$pdf->SetXY(110,116.7+11.5);$pdf->Write(0,"X");}
	//if ($row->EPFP=='1'){$pdf->SetXY(16.5,116.7+15);$pdf->Write(0,"X");}



	//partie medicale//
	$pdf->SetXY(22,147);$pdf->Write(0,'Code CIM10 : '.$pdf->nbrtostring('cim','row_id',$row->CODECIM,'diag_cod'));
	$pdf->SetXY(160,143);$pdf->Cell(35,5,html_entity_decode(utf8_decode("N°: ")).$row->STRUCTURED."/".$row->id,0,1,'C');
	
	$pdf->SetXY(44,136.7+15.5);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(41,136.7+15.5+4);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));
	$pdf->SetXY(48,136.7+15.5+7.5);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'));
	$pdf->SetXY(45,136.7+15.5+7.5+3.5);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAR,'WILAYAS'));
	$pdf->SetXY(42,136.7+15.5+15);$pdf->Write(0,$pdf->dateUS2FR($row->DATENAISSANCE));
	$pdf->SetXY(90,136.7+15.5+15);$pdf->Write(0,$pdf->dateUS2FR($row->DINS));
	$pdf->SetXY(29,136.7+15.5+18);$pdf->Write(0,$row->SEX);
	
	if ($row->Days >= 365) 
	{
		$pdf->SetXY(88,137.7+16.5+15+1.5);$pdf->Write(0,$row->Years);
		$pdf->SetXY(107+5,137.7+16.5+15+5);$pdf->Write(0,'***');
		$pdf->SetXY(107+5+15,136.7+16.5+15+6);$pdf->Write(0,'***');	
	}
	if ($row->Days <= 30) 
	{
		$pdf->SetXY(88,137.7+16.5+15+2.5);$pdf->Write(0,'***');
		$pdf->SetXY(107+5,137.7+16.5+15+5);$pdf->Write(0,'***');
		$pdf->SetXY(108+5+15,136.7+16.5+15+5.5);$pdf->Write(0,$row->Days);
	}
	if ($row->Days > 30  and  $row->Days < 365 ) 
	{
		$pdf->SetXY(88,137.7+16.5+15+2.5);$pdf->Write(0,'***');
		$pdf->SetXY(107+5,137.7+16.5+15+4.5);$pdf->Write(0,$row->Months);
		$pdf->SetXY(107+5+15,136.7+16.5+15+5.5);$pdf->Write(0,'***');
		
	}
	
	$pdf->SetXY(62,177);$pdf->Write(0,$pdf->nbrtostring('profession','id',$row->Profession,'Profession'));
	

	$pdf->SetXY(24,183);$pdf->Cell(4,2,"",1,1,'C');   $pdf->SetXY(24+23,183);$pdf->Cell(4,2,"",1,1,'C');    $pdf->SetXY(24+62,183);$pdf->Cell(4,2,"",1,1,'C');
	$pdf->SetXY(24,186.5);$pdf->Cell(4,2,"",1,1,'C'); $pdf->SetXY(24+23,186.5);$pdf->Cell(4,2,"",1,1,'C');
	
		
	switch($row->LD)  
		{
			case 'DOM':
				{
				$pdf->SetXY(24,184);$pdf->Write(0,"X");
				break;
				}
			case 'VP':
				{
				$pdf->SetXY(24,187.5);$pdf->Write(0,"X");
				break;
				}
			case 'AAP':
				{
				$pdf->SetXY(24+23,187.5);$pdf->Write(0,"X");
	            $pdf->SetXY(24+50,187.5);$pdf->Write(0,$row->AUTRES."ggg");
				break;
				}
			case 'SSP':
				{
				$pdf->SetXY(24+23,184);$pdf->Write(0,"X");
				break;
				}
			case 'SSPV':
				{
				$pdf->SetXY(24+62,184);$pdf->Write(0,"X");
				break;
				}		
		}
			
	$pdf->SetXY(51,136.8+16.5+25+29-9);$pdf->Write(0,html_entity_decode(utf8_decode($row->CIM1)));
	$pdf->SetXY(51,136.8+16.5+25+26);$pdf->Write(0,html_entity_decode(utf8_decode($row->CIM2)));
	$pdf->SetXY(51,136.8+16.5+25+26+3);$pdf->Write(0,html_entity_decode(utf8_decode($row->CIM3)));
	$pdf->SetXY(51,136.8+16.5+25+26+6);$pdf->Write(0,html_entity_decode(utf8_decode($row->CIM4)));
	$pdf->SetXY(51,136.8+16.5+25+26+12);$pdf->Write(0,html_entity_decode(utf8_decode($row->CIM5)));

	$pdf->SetXY(25,136.8+16.5+25+59.5);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
	$pdf->SetXY(49,136.8+16.5+25+59.5);$pdf->Write(0,$pdf->dateUS2FR($row->DINS));
	$pdf->SetXY(100,136.8+16.5+25+59);$pdf->Write(0,$row->MEDECINHOSPIT);//.$row->USER
	


//mise ajour
//******************************************************************************************************************************************//
		
	//partie droite   
	//- Nature de la mort
	switch($row->NDLM)  
		{
			case 'NAT':
				{
				$pdf->SetXY(176,136.7+16.5);$pdf->Write(0,"x");
				break;
				}
			case 'ACC':
				{
				$pdf->SetXY(150,136.7+19.5);$pdf->Write(0,"x");
				break;
				}
			case 'AID':  
				{
				$pdf->SetXY(167.8,136.7+19.5);$pdf->Write(0,"x");
				break;
				}	
			case 'AGR':  
				{
				$pdf->SetXY(150,136.7+22);$pdf->Write(0,"x");
				break;
				}	
			case 'IND':  
				{
				$pdf->SetXY(168.8,136.7+22);$pdf->Write(0,"x");
				break;
				}		
			case 'AAP':  
				{
				$pdf->SetXY(172,136.7+25);$pdf->Write(0,"x");
				$pdf->SetXY(158,136.7+25);$pdf->Write(0,$row->NDLMAAP);
				break;
				}			
		}
	
	//- Mortinatalité, périnatalité
	if ($row->GM=='1')
	{
	$pdf->SetXY(167,136.7+32);$pdf->Write(0,"x");
	}
	else
	{
	$pdf->SetXY(176.5,136.7+32);$pdf->Write(0,"x");
	}
    
	if ($row->MN=='1')
	{
	$pdf->SetXY(157.5,136.7+35);$pdf->Write(0,"x");
	}
	else
	{
	$pdf->SetXY(168,136.7+35);$pdf->Write(0,"x");
	}
	$pdf->SetXY(176,136.7+38);$pdf->Write(0,$row->AGEGEST);
	$pdf->SetXY(179,136.7+41);$pdf->Write(0,$row->POIDNSC);
	$pdf->SetXY(169.5,136.7+43);$pdf->Write(0,$row->AGEMERE);
	$pdf->SetXY(173.5,136.7+51.5);$pdf->Write(0,$row->EMDPNAT);
	// Décés maternel 
	if ($row->DECEMAT=='1')
	{
	$pdf->SetXY(166.5,136.7+58.5);$pdf->Write(0,"X");
	switch($row->GRS)          
		{
			case 'DGRO':
				{
				$pdf->SetXY(154.5,136.7+64.5);$pdf->Write(0,"X");
				break;
				}
			case 'DACC':
				{
				$pdf->SetXY(144,136.7+73);$pdf->Write(0,"x");
				break;
				}
			case 'DAVO':
				{
				$pdf->SetXY(144,136.7+73);$pdf->Write(0,"x");
				break;
				}
			case 'AGESTATION':
				{
				$pdf->SetXY(155,136+79);$pdf->Write(0,"x");
				break;
				}
			case 'IDETER':
				{
				$pdf->SetXY(155.5,136+82);$pdf->Write(0,"x");
				break;
				}		
		}
	}
	else
	{
	$pdf->SetXY(176,136.7+58.5);$pdf->Write(0,"X");
	}
    if ($row->OMLI=='1'){ $pdf->SetXY(166,136+98);$pdf->Write(0,"x");}else {$pdf->SetXY(176,136+98);$pdf->Write(0,"x");}
	if ($row->MIEC=='1'){ $pdf->SetXY(162,136+106);$pdf->Write(0,"x");}else {$pdf->SetXY(173.5,136+106);$pdf->Write(0,"x");}
	if ($row->EPFP=='1'){ $pdf->SetXY(144.5,136+115);$pdf->Write(0,"x");}else {$pdf->SetXY(156.5,136+115);$pdf->Write(0,"x");}
    if ($row->POSTOPP=='1'){ $pdf->SetXY(154.5,136+127);$pdf->Write(0,"x");}else {$pdf->SetXY(166.5,136+127);$pdf->Write(0,"x");}
    $pdf->SetFont('Arial','B',7);
	$pdf->SetXY(138,275);$pdf->Write(0,"Etabli par l'agent : ( * ".$row->USER." )");
	$pdf->SetFont('Arial','B',10);

//******************************************************************************************************************************************//
$pdf->AddPage();
$pdf->setSourceFile('decesfrx.pdf');
$tplIdx = $pdf->importPage(17);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
// $pdf->EAN13(15,50,$ID,$h=6,$w=.35);$pdf->EAN13(150,50,time(),$h=6,$w=.35);
$pdf->SetXY(28+8,62);$pdf->Write(0,$pdf->nbrtostring('WIL','IDWIL',$row->WILAYAD,'WILAYAS'));
$pdf->SetXY(32+8,74.5);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNED,'COMMUNE'));
}
$pdf->Output();
?>