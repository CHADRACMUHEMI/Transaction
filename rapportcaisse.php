<?php
session_start();
//  if (isset($_SESSION['admin']) || ((isset($_SESSION['Medecin_IT']['FonctAgen']) && !empty($_SESSION['Medecin_IT']['FonctAgen']))) ){ 
// require_once('Admin/connexion.php');


require_once('config/tcpdf_config.php');
require_once('tcpdf.php');

function GenererPDF(){
    // $conn = new mysqli('localhost', 'lekuste', '1234', 'ass_neema');
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);

$pdf->SetAuthor('james');
$pdf->SetTitle('RAPPORT DE CAISSE');
$pdf->SetSubject('RAPPORT DE CAISSE');
// $pdf->setPageOrientation('L');
$pdf->setPageOrientation('P');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data

$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 11);

// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 14);

    $pdf->Write(0, 'RAPPORT DE CAISSE ', '', 0, 'C', true, 0, false, false, 0);
// $date1=New DateTime($_SESSION['date1']);
// $date2=New DateTime($_SESSION['datesaisie']);

// $pdf->Write(0, " DU ". strval($date1->format('d-m-Y')) ." AU ".strval($date2->format('d-m-Y')), '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '___________________', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);


// $date1=$_SESSION['date1'];
// $date2=$_SESSION['date2'];
// // $date1=$_SESSION['date1'];
// // $date2=$_SESSION['date2'];
// $memb =$_SESSION['membreSelected']['telephone'];

$pdf->SetFont('helvetica', 'B', 14);

    // Consultation 
//     $Membresss = " SELECT `membre`.`ResidMemb`,`membre`.`TelepMemb`, CONCAT(`membre`.`nomMemb`,' ', `membre`.`PstnomMemb`,' ',`membre`.`PrnomMemb`) as noms from `membre` WHERE  `membre`.`TelepMemb`='$memb'";
//     $donneesMembre=$conn->query($Membresss);
//     $donneesMembre=$donneesMembre->fetch_assoc();
//     $nomMembre = $donneesMembre['noms'];

//    // $syntese = " SELECT `centre`.`nomCentr`,`examen`.`CodExamen`,`examen`.`descrExamen`,`parametre`.`descrparametre`,`prelevement`.`descrPrelevement`,`prelevement`.`valRefprelevement`, `examination`.`dateExamination`, `examination`.`valtrouvExamination`, `examination`.`observExamination` FROM `examination` INNER JOIN `prelevement` ON `prelevement`.`CodePrelevement`=`examination`.`CodePrelevement` INNER JOIN `parametre` ON `parametre`.`CodeParametre`=`prelevement`.`CodeParametre` INNER JOIN `examen` ON `parametre`.`CodExamen`=`examen`.`CodExamen` INNER JOIN `consultation` ON `examination`.`NumConsultation`=`consultation`.`NumCons` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` INNER JOIN `agent` ON `agent`.`TelepAgen`=`consultation`.`TelepAgen` INNER JOIN `centre` ON `centre`.`NumCentr`=`agent`.`TelepAgen` WHERE `examination`.`dateExamination`>='".strval($date1->format('Y-m-d'))."' AND `examination`.`dateExamination`< '".$date2."' AND `membre`.`TelepMemb`='$memb'";
//     $syntese = " SELECT `consultation`.`plaintCons`,`consultation`.`dateCons`,`consultation`.`diagnCons`,`consultation`.`observCons` FROM `consultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb' ORDER BY `consultation`.`dateCons` DESC LIMIT 1 ";
//     $donnees=$conn->query($syntese);
//     $tbl ='<h3 style="text-align:left;">MEMBRE : '.$nomMembre.' </h3>';
//     $tbl .= "<p>TELEPHONE :"." ". $donneesMembre['TelepMemb'] ." </p>";
//     $tbl .= "<p>ADRESSE :"." ". $donneesMembre['ResidMemb'] ." </p>";
 
    
//     // Consultation 

//         $tbl .= '<h3 style="text-align:center;">I. CONSULTATION</h3>';
//         $donneesSytheseMembre=$donnees->fetch_assoc();
//         if(!empty($donneesSytheseMembre['diagnCons'])){
    $tbl="";
    
        $tbl .="<div style='text-align:center; width:100px;['>
                <h5 >Rapport de caisse du Date 10/10/2023 </h5>

        </div>";
            $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
        $pdf->SetFont('helvetica', 'B', 12);
        
//         // -----------------------------------------------------------------------------
//         // $numDomaine=0;
        
        
            $tbl .='
                <thead>
                    <tr style="background-color:#FFFF00;color:#0000FF;">
                    
                        <td  align="center" > Compte </td>
                        <td  align="center" > Opération </td>
                        <td  align="center" > Montant </td>
                    </tr>
                </thead>';
            $pdf->SetFont('helvetica', 'B', 11);
            // $dat=New DateTime($donneesSytheseMembre['dateCons'] );
            // $dat=strval($dat->format('d/m/Y'));
            $tbl .= '<tr>
                    <td align="left">Compte courant</td>
                    <td  align="left"> Depot</td>
                    <td  align="left">2000</td>
                   </tr>';
                  
                   $tbl .= '<tr>
                   <td align="left">Solde Total</td>
                  </tr>';

        $tbl .= '
        </table> <br><br>
        ';  

    $pdf->writeHTML($tbl, true, false, false, false, '');
   

// // examination 
// $syntese = " SELECT `centre`.`nomCentr`,`examen`.`CodExamen`,`examen`.`descrExamen`,`parametre`.`descrparametre`,`prelevement`.`descrPrelevement`,`prelevement`.`valRefprelevement`, `examination`.`dateExamination`, `examination`.`valtrouvExamination`, `examination`.`observExamination` FROM `examination` INNER JOIN `prelevement` ON `prelevement`.`CodePrelevement`=`examination`.`CodePrelevement` INNER JOIN `parametre` ON `parametre`.`CodeParametre`=`prelevement`.`CodeParametre` INNER JOIN `examen` ON `parametre`.`CodExamen`=`examen`.`CodExamen` INNER JOIN `consultation` ON `examination`.`NumConsultation`=`consultation`.`NumCons` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` INNER JOIN `agent` ON `agent`.`TelepAgen`=`consultation`.`TelepAgen` INNER JOIN `centre` ON `centre`.`NumCentr`=`agent`.`TelepAgen` WHERE `examination`.`dateExamination`>='".strval($date1->format('Y-m-d'))."' AND `examination`.`dateExamination`< '".$date2."' AND `membre`.`TelepMemb`='$memb'";
// $donnees=$conn->query($syntese);

// $tbl = '<h3 style="text-align:center;">II. EXAMINATION </h3> ';
// $pdf->SetFont('helvetica', 'B', 12);
//       $donneesExamination=$donnees->fetch_assoc();
            
//         if(!empty($donneesExamination)){
// $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
        
//         $tbl .= '<thead>
//                     <tr style="background-color:#FFFF00;color:#0000FF;">
                    
//                         <td  align="center" > Date </td>
//                         <td  align="center" > Parametre </td>
//                         <td  align="center" >Prelevement</td>
//                         <td align="center" ><b>Val REF</b></td>
//                         <td align="center"><b>Val trouvée</b></td>
//                         <td align="center" ><b>Structure</b></td>
//                         <td align="center" ><b>OBS</b></td>
//                     </tr>
//                 </thead>';
            
//             //`parametre`.`descrparametre`,`prelevement`.`descrPrelevement`,`prelevement`.`valRefprelevement`, `examination`.`dateExamination`, `examination`.`valtrouvExamination`, `examination`.`observExamination`
         
//             $pdf->SetFont('helvetica', 'B', 11);
//             $dat=New DateTime($donneesExamination['dateExamination'] );
//             $dat=strval($dat->format('d/m/Y'));
//             $tbl .= '<tr>
//                     <td align="left">'. $dat .'</td>
//                     <td align="left">'. $donneesExamination['descrparametre'] .'</td>
//                     <td  align="left">'. $donneesExamination['descrPrelevement'] .'</td>
//                     <td  align="right">'. $donneesExamination['valRefprelevement'].'</td>
//                     <td  align="right">'. $donneesExamination['valtrouvExamination'].'</td>
//                     <td  align="left">'. $donneesExamination['nomCentr'].'</td>
//                     <td  align="left">'. $donneesExamination['observExamination'].'</td>
//             </tr>';
    
       
//         $tbl .= '
//         </table>
//         ';  
    // }else{
    //     $tbl .='<h3 style="text-align:center;color:red;"> Pas d\'informations</h3><br>';
    // }
// $pdf->writeHTML($tbl, true, false, false, false, '');


// Prescriptions 
// $dernierePrescr = "SELECT `prescription`.`datePrescription` FROM  `prescription`  INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb'  ORDER BY `prescription`.`numprescription` DESC  LIMIT 1 ";
// $dernierePrescrs=$conn->query($dernierePrescr);
// $dernierePrescrss=$dernierePrescrs->fetch_assoc();
// $dernierePrescrss=$dernierePrescrss['datePrescription'];
// if(!empty($dernierePrescrss)){
//     $dat=New DateTime($dernierePrescrss);
//     $dat=strval($dat->format('Y-m-d'));
// }else{
//     $dat="";
    
// }
// $synteses = "SELECT `detailprescription`.`quantite`,	`detailprescription`.`dose`, `detailprescription`.`numprescription`, `detailprescription`.`CodeProduit`, `produit`.`designProduit`, `prescription`.`datePrescription`,CONCAT(`membre`.`nomMemb`,' ',`membre`.`PstnomMemb`,' ',`membre`.`PrnomMemb`) as noms, `membre`.`TelepMemb` FROM `detailprescription` INNER JOIN `prescription` ON `detailprescription`.`numprescription`=`prescription`.`numprescription` INNER JOIN `produit` ON `produit`.`CodeProduit`=`detailprescription`.`CodeProduit` INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb' AND DATE(`prescription`.`datePrescription`) >= '". $dat ."' ORDER BY `prescription`.`numprescription` DESC ";
// $donneess=$conn->query($synteses);

// while($donneesPrescriptionsss=$donneess->fetch_assoc()){
//     $existeprescri=true;
// }

// $syntese = "SELECT `detailprescription`.`quantite`,	`detailprescription`.`dose`, `detailprescription`.`numprescription`, `detailprescription`.`CodeProduit`, `produit`.`designProduit`, `prescription`.`datePrescription`,CONCAT(`membre`.`nomMemb`,' ',`membre`.`PstnomMemb`,' ',`membre`.`PrnomMemb`) as noms, `membre`.`TelepMemb` FROM `detailprescription` INNER JOIN `prescription` ON `detailprescription`.`numprescription`=`prescription`.`numprescription` INNER JOIN `produit` ON `produit`.`CodeProduit`=`detailprescription`.`CodeProduit` INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb' AND DATE(`prescription`.`datePrescription`) >= '". $dat ."' ORDER BY `prescription`.`numprescription` DESC ";
// $donnees=$conn->query($syntese);
// $tbl = '<h3 style="text-align:center;">III. PRESCRIPTION MEDICALE </h3> ';

// if($existeprescri){

// $pdf->SetFont('helvetica', 'B', 12);
//         $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
//         $pdf->SetFont('helvetica', 'B', 12);
//         $tbl .='
//         <thead>
//             <tr style="background-color:#FFFF00;color:#0000FF;">
//             <td align="center" width="10%"><b>N°</b></td>
//                 <td  align="center" width="20%">Date prescription</td>
//                 <td  align="center" width="20%">Code Produit</td>
//                 <td  align="center" width="40%">designation</td>
//                 <td align="center" width="10%"><b>Qtes</b></td>
//             </tr>
//        </thead>';
//         // -----------------------------------------------------------------------------
//         // $numDomaine=0;
//         $compte=0;
//         while($donneesPrescription=$donnees->fetch_assoc()){
//             $compte ++;
//             $pdf->SetFont('helvetica', 'B', 11);
//             $dat=New DateTime($donneesPrescription['datePrescription'] );
//             $dat=strval($dat->format('d/m/Y'));
//             $tbl .= '<tr>
//                     <td width="10%" align="left">'. $compte .'</td>
//                     <td width="20%" align="left">'. $dat .'</td>
//                     <td width="20%" align="left">'. $donneesPrescription['CodeProduit'] .'</td>
//                     <td width="40%" align="left">'. $donneesPrescription['designProduit'] .'</td>
//                     <td width="10%" align="right">'. $donneesPrescription['quantite'].'</td>
//             </tr>';
//         }
       
//         $tbl .= '
//         </table>
//         '; 
//         }else{
//         $tbl .='<h3 style="text-align:center;color:red;"> Pas d\'informations</h3> <br>';
//     }
// $pdf->writeHTML($tbl, true, false, false, false, '');




// Distributions des produits 

// //SELECT `distribution`.`dateDistribution` FROM `distribution` INNER JOIN `detailprescription` ON `distribution`.`IdDetailprescription`=`detailprescription`.`IdDetailprescription` INNER JOIN `prescription` ON `detailprescription`.`numprescription`  INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb'  ORDER BY `distribution`.`dateDistribution` DESC  LIMIT 1
// $dernierePrescr = "SELECT `distribution`.`dateDistribution` FROM `distribution` INNER JOIN `detailprescription` ON `distribution`.`IdDetailprescription`=`detailprescription`.`IdDetailprescription` INNER JOIN `prescription` ON `detailprescription`.`numprescription`  INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb'  ORDER BY `distribution`.`dateDistribution` DESC  LIMIT 1";
// $dernieredistribu=$conn->query($dernierePrescr);
// $dernieredistribus=$dernieredistribu->fetch_assoc();
// $dernieredistribus=$dernieredistribus['dateDistribution'];
// if(!empty($dernieredistribus)){
//     $dat=New DateTime($dernieredistribus);
//     $dat=strval($dat->format('Y-m-d'));
// }else{
//     $dat="";
    
// }

// $synteses = "SELECT `detailprescription`.`quantite`,	`detailprescription`.`dose`, `detailprescription`.`numprescription`, `detailprescription`.`CodeProduit`, `produit`.`designProduit`, `prescription`.`datePrescription`,CONCAT(`membre`.`nomMemb`,' ',`membre`.`PstnomMemb`,' ',`membre`.`PrnomMemb`) as noms, `membre`.`TelepMemb` FROM `detailprescription` INNER JOIN `prescription` ON `detailprescription`.`numprescription`=`prescription`.`numprescription` INNER JOIN `produit` ON `produit`.`CodeProduit`=`detailprescription`.`CodeProduit` INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` WHERE `membre`.`TelepMemb`='$memb' AND DATE(`prescription`.`datePrescription`) >= '". $dat ."' ORDER BY `prescription`.`numprescription` DESC ";
// $donneess=$conn->query($synteses);

// while($donneesPrescriptionsss=$donneess->fetch_assoc()){
//     $existeprescri=true;
// }

// $syntese = "SELECT `centre`.`nomCentr`,`distribution`.`dateDistribution`,SUM(`distribution`.`QuanteDistribution`) as  sommeQt,`produit`.`designProduit`,`detailprescription`.`CodeProduit` FROM `distribution` INNER JOIN `detailprescription` oN `detailprescription`.`IdDetailprescription`=`distribution`.`IdDetailprescription` INNER JOIN `produit` ON `produit`.`CodeProduit`=`detailprescription`.`CodeProduit` INNER JOIN `prescription` on `prescription`.`numprescription`=`detailprescription`.`numprescription` INNER JOIN `consultation` ON `consultation`.`NumCons`=`prescription`.`NumConsultation` INNER JOIN `agent` ON `agent`.`TelepAgen`=`consultation`.`TelepAgen` INNER JOIN `membre` ON `membre`.`TelepMemb`=`consultation`.`TelepMemb` INNER JOIN `centre` ON `centre`.`NumCentr`=`agent`.`NumCentr`  WHERE `membre`.`TelepMemb`='$memb' AND DATE(`distribution`.`dateDistribution`)='$dat' GROUP BY `centre`.`nomCentr`,`produit`.`CodeProduit`";
// $donnees=$conn->query($syntese);
// $tbl = '<h3 style="text-align:center;"> IV. DISTRIBUTION DES PRODUITS </h3> ';
// if($existeprescri){

// $pdf->SetFont('helvetica', 'B', 12);
//         $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
//         $pdf->SetFont('helvetica', 'B', 12);
//         $tbl .='
//         <thead>
//             <tr style="background-color:#FFFF00;color:#0000FF;">
//             <td align="center" ><b>N°</b></td>
//                 <td  align="center" >Date </td>
//                 <td  align="center">Code Produit</td>
//                 <td  align="center" >designation</td>
//                 <td align="center" ><b>Qtes</b></td>
//             </tr>
//        </thead>';
//         // -----------------------------------------------------------------------------
//         // $numDomaine=0;
//         $compte=0;
//         while($donneesPrescription=$donnees->fetch_assoc()){
//             $compte ++;
//             //centre`.`nomCentr`,`distribution`.`dateDistribution`,SUM(`distribution`.`QuanteDistribution`) as  sommeQt,`produit`.`designProduit`
//             $pdf->SetFont('helvetica', 'B', 11);
//             $dat=New DateTime($donneesPrescription['dateDistribution'] );
//             $dat=strval($dat->format('d/m/Y'));
//             $tbl .= '<tr>
//                     <td  align="left">'. $compte .'</td>
//                     <td  align="left">'. $dat .'</td>
//                     <td  align="left">'. $donneesPrescription['CodeProduit'] .'</td>
//                     <td  align="left">'. $donneesPrescription['designProduit'] .'</td>
//                     <td  align="right">'. $donneesPrescription['sommeQt'].'</td>
//             </tr>';
//         }
       
//         $tbl .= '
//         </table>
//         '; 
//         }else{
//         $tbl .='<h3 style="text-align:center;color:red;"> Pas d\'informations</h3> <br>';
//     }
// $pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->Output('Rapport.pdf', 'I');

}

GenererPDF();
 ?>