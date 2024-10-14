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
$pdf->SetTitle('RELEVE DE COMPTE');
$pdf->SetSubject('RELEVE DE COMPTE');
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
$pdf->SetFont('helvetica', 'B', 16);
$tbl="";
$idoperation ="";
include('connexion.php');
if(isset($_POST['btn-imprimer'])){
    $id = $_POST['id'];
    $typerapport = $_POST['typedoc'];
    $date1 = $_POST['date1'];
    $date2 = $_POST['date2'];

    if($typerapport =="2"){
        $pdf->Write(0, 'RAPPORT DE RELEVE DE COMPTE ', '', 0, 'C', true, 0, false, false, 0);
        $pdf->Write(0, '_______________________________', '', 0, 'C', true, 0, false, false, 0);
        $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);

            $requeteClient = "SELECT * from operation INNER JOIN categorieoperation on categorieoperation.id_categorieoperation = operation.id_categorieoperation INNER JOIN compte ON compte.id_compte = operation.id_compte INNER join client on client.idclient = compte.idclient where operation.id_operation='$id'";
            $stm=$con->query($requeteClient);
            $donnees = $stm->fetch();

            $tbl .="<div style='text-align:center; width:100px;'>
                    <h5 >Nom : ".$donnees['nom']."</h5>
                    <h5 >Postnom : ".$donnees['postnom']."</h5>
                    <h5 >Genre : ".$donnees['genre']."</h5>
                    <h5 >Telephone : ".$donnees['telephone']."</h5>
            </div>";
                $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
            $pdf->SetFont('helvetica', 'B', 12);

            

                $tbl .='
                    <thead>
                        <tr style="background-color:#FFFF00;color:#0000FF;">
                        
                            <td  align="center" > Compte </td>
                            <td  align="center" > Opération </td>
                            <td  align="center" > Montant </td>
                            <td  align="center" > Date </td>
                            <td  align="center" >Solde</td>
                        </tr>
                    </thead>';
                $pdf->SetFont('helvetica', 'B', 11);
                // $dat=New DateTime($donneesSytheseMembre['dateCons'] );
                // $dat=strval($dat->format('d/m/Y'));
                $idclient=$donnees['idclient'];
                $requeteOperations= "SELECT * FROM operation inner join compte on compte.id_compte = operation.id_compte inner join categorieoperation on operation.id_categorieoperation= categorieoperation.id_categorieoperation where compte.idclient= '$idclient' and DATE(date_operation) >='$date1' and date_operation <'$date2' ";
                $stmListOperation=$con->query($requeteOperations);
                $solde = 0;
                while($operations = $stmListOperation->fetch()){
                $tbl .= '<tr>';
                $requeteCompte = "SELECT * FROM compte INNER JOIN categoriecompte on categoriecompte.id_categoriecompte = compte.id_categoriecompte WHERE compte.idclient ='$idclient'";
                $stmCompte=$con->query($requeteCompte);
                $donneesCompte = $stmCompte->fetch();
                if($operations['nom_categorieoperation']=="Retrait"){
                    $solde = $solde-$operations['montant'];
                }else {
                    $solde = $solde+$operations['montant'];
                }
                $tbl .= '<td align="left">'.$donneesCompte['nom_categoriecompte'].'</td>

                        <td  align="left"> '.$operations['nom_categorieoperation'].'</td>
                        <td  align="left">'.$operations['montant'].'</td>
                        <td  align="left">'.$operations['date_operation'].'</td>
                        <td  align="left">'.$solde.'</td>
                    </tr>';

                }
                    
            $tbl .= '
            </table> <br><br>
            ';  
        }else if($typerapport =="1"){
            $req = $con->query("SELECT * FROM `operation` INNER JOIN categorieoperation ON categorieoperation.id_categorieoperation = operation.id_categorieoperation INNER JOIN compte ON compte.id_compte = operation.id_compte JOIN client ON compte.idclient = client.idclient INNER JOIN compteutilisateur ON compteutilisateur.id_compteuser = operation.id_compteuser WHERE operation.id_operation='".$id."'");
            //   
               
                while($resultat=$req->fetch()){
                    $tbl .="<div style='text-align:center; width:100px;['>
                            <h2 >RECUS D'OPERATION N° : ..... </h2>
                            <h5 >SUBMIT TO CASH MANAGEMENT</h5>
                            <h5 >Submit@gmail.Com</h5>
                            <h5 >R.D.C / Ville de Butembo</h5>
                            <h5 >Nom : ".$resultat["nom"]." </h5>
                            <h5 >Postnom : ".$resultat["postnom"]."</h5>
            
                    </div>";
                        $tbl .= '<table border="1" cellpadding="2" align="center" cellspacing="2">';
                    $pdf->SetFont('helvetica', 'B', 12);
                    
                        $tbl .='
                            <thead>
                                <tr style="background-color:#FFFF00;color:#0000FF;">
                                
                                    <td  align="center" > Opération </td>
                                    <td  align="center" > Montant </td>
                                    <td  align="center" > Date </td>
                                    <td  align="center" > User </td>
                                </tr>
                            </thead>';
                        $pdf->SetFont('helvetica', 'B', 11);
                        $tbl .= '<tr>
                                <td align="left">'.$resultat["nom_categorieoperation"].'</td>
                                <td  align="left"> '.$resultat["montant"].'</td>
                                <td  align="left"> '.$resultat["date_operation"].'</td>
                                <td  align="left"> '.$resultat["pseudo"].'</td>
                               </tr>';
                        
                  
                    $tbl .= '
                    </table> <br><br>
                    ';
                }
        }else{
            
            // rleve de caisse 

        }

}
    $pdf->writeHTML($tbl, true, false, false, false, '');
   


$pdf->Output('Rapport.pdf', 'I');

}

GenererPDF();



 ?>