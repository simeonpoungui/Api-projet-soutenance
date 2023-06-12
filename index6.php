<?php

use JetBrains\PhpStorm\Language;

require('config/db.php');
require('fpdf184/fpdf.php');

$requete = "SELECT * from inscription";
$query = $db->query($requete);
$tableau = $query->fetchAll(PDO::FETCH_ASSOC);

 
class PDF extends FPDF{

    public function header(){

        $image = "image/logo.png";
        
        $this->SetFont('Arial','B',10);
        $this->Cell(10);//pour les margin
        $this->Cell(25,4,"UNIVERSITE MARIEN N'GOUABI",0,'C',1);
        $this->SetFont('Arial','B',12);
        $this->Cell(120);//pour les margin
        $this->Cell(25,4,utf8_decode("Travail*Progrès*Humanité"),0,'C',1);
        $this->Image($image,150,30,33,28);

        $this->Ln(1);

        $this->SetFont('Arial','B',12);
        $this->Cell(138);//pour les margin
        $this->Cell(25,4,"------------------------",0,'C',1);

        $this->Ln(-8);

        $this->SetFont('Arial','B',10);//B=couleur en gras et 10=font size
        $this->Cell(20); //saut de ligne
        $this->Cell(25,4,'**************************',0,'C',1);

        $this->Ln(1);
        
        $this->SetFont('Arial','B',14);
        $this->Cell(25);
        $this->Cell(25,4,"RECTORAT ",0,'C',1);

        $this->Ln(1);

        $this->SetFont('Arial','B',10);
        $this->Cell(30);
        $this->Cell(25,4,'************',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(13);
        $this->Cell(25,4,'VICE-PRESIDENCE CHARGE',0,'C',1);

        $this->Ln(1);

        $this->SetFont('Arial','B',10);
        $this->Cell(12);
        $this->Cell(25,4,'DES AFFAIRES ACADEMIQUES',0,'C',1);

        $this->Ln(1);

        $this->SetFont('Arial','B',10);
        $this->Cell(20);
        $this->Cell(25,4,'***********************',0,'C',1);

        $this->Ln(1);

        $this->SetFont('Arial','B',10);
        $this->Cell(5);
        $this->Cell(25,4,'DIRECTION DE LA SCOLARITE ET DES',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(28);
        $this->Cell(25,4,'EXAMENS',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(25);
        $this->Cell(25,4,'****************',0,'C',1);

        $this->Ln(1);

        $this->SetFont('Arial','B',10);
        $this->Cell(13);
        $this->Cell(25,4,'SERVICE ADMINISTATIF',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(9);
        $this->Cell(25,4,'CHARGE DE LA COORDINATION',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',9);
        $this->Cell(20);
        $this->Cell(25,4,'**************************',0,'C',1);

        $this->Ln(3);

        $this->SetFont('Arial','B',9);
        $this->Cell(10);
        $this->Cell(25,4,'BP . 69 BRAZZAVILLE-CONGO',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',9);
        $this->Cell(2);
        $this->Cell(25,4,'Email : universite.marion.ngouabi@umng.cg',0,'C',1);

        $this->Ln(10);

        $this->SetFont('Arial','I',20);
        $this->Cell(40);
        $this->Cell(25,4,utf8_encode("ATTESTATION D'INSCRIPTION"),0,'C',1);

        $this->Ln(10);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Le Directeur de la Scolarité et des Examens de l'université Marien N'GOUABI, ateste que"),0,'C',1);

        $this->Ln(8);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,'M ....................................................................................................................................................',0,'C',1);

        $this->Ln(8);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Né (e) le, ........................................................................................................................................"),0,'C',1);

       
        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,'A : ..................................................................................................................................................',0,'C',1);

        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("a été reguliérement inscrit (e) a (*) : ............................................................................................"),0,'C',1);
        
        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Pour l'année Universitaire :.......................... en(**) .......... année de (***) ..................................."),0,'C',1);

        
        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Parcours : ......................................................................................................................................."),0,'C',1);
        
          
        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Spécialité : ......................................................................................................................................"),0,'C',1);
        
          
        $this->Ln(13);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Option : ..........................................................................................................................................."),0,'C',1);
        
        
        $this->Ln(17);

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("La presente attestation est delivrée en vue d'un usage administratif. Elle n'implique pas"),0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("la reussite aux examens de l'année susmentionnée."),0,'C',1);
        
        
        $this->Ln(15);

    }
    

    public function footer(){

        $this->SetFont('Arial','B',10);
        $this->Cell(100);
        $this->Cell(25,4,utf8_decode("Fait à Brazzaville le _________________"),0,'C',1);

        $this->Ln(10);

        $this->SetFont('Arial','B',10);
        $this->Cell(100);
        $this->Cell(25,4,utf8_decode("Pour le Directeur de la Scolarité ,"),0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(100);
        $this->Cell(25,4,utf8_decode("et des Examens et par délégation"),0,'C',1);

        $this->Ln(10);

        $this->SetFont('Arial','B',14);
        $this->Cell(100);
        $this->Cell(25,4,'Le chef de Service',0,'C',1);

        $this->Ln(-10);

        $this->SetFont('Arial','B',8);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("(*) preciser l'établissement"),0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',8);
        $this->Cell(15);
        $this->Cell(25,4,'(**) preciser le niveau',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',8);
        $this->Cell(15);
        $this->Cell(25,4,'(***) preciser le cycle (Licence , Master , Doctorat)',0,'C',1);

        $this->Ln(10);

        $this->SetFont('Arial','B',13);
        $this->Cell(15);
        $this->Cell(25,4,utf8_decode("Attestation enregistrée sous le n°  ........................"),0,'C',1);
    }

}
$pdf=new PDF();
$pdf->SetFont('Arial','B',8);
$pdf->AddPage('P');
$pdf->Output();

?>