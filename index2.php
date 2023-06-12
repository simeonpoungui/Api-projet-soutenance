<?php

require('config/db.php');
require('fpdf184/fpdf.php');

$requete = "SELECT * from inscription";
$query = $db->query($requete);
$tableau = $query->fetchAll(PDO::FETCH_ASSOC);


 
class PDF extends FPDF{

    public function EN_TETE(){

        $image = "image/logo.png";
        
        $this->SetFont('Arial','B',10);
        $this->Cell(10);//pour les margin
        $this->Cell(25,4,"UNIVERSITE MARIEN N'GOUABI",0,'C',1);
        $this->SetFont('Arial','B',12);
        $this->Cell(120);//pour les margin
        $this->Cell(25,4,"Travail*Progres*Humanite",0,'C',1);
        $this->Image($image,150,30,33,28);

        $this->Ln(1);

        $this->SetFont('Arial','B',12);
        $this->Cell(140);//pour les margin
        $this->Cell(25,4,"-----------------------",0,'C',1);

        $this->Ln(-6);

        $this->SetFont('Arial','B',10);//B=couleur en gras et 10=font size
        $this->Cell(20); //saut de ligne
        $this->Cell(25,4,'**************************',0,'C',1);

        $this->Ln();
        
        $this->SetFont('Arial','B',10);
        $this->Cell(25);
        $this->Cell(25,4,"PRESIDENCE ",0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(27);
        $this->Cell(25,4,'************',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(13);
        $this->Cell(25,4,'VICE-PRESIDENCE CHARGE',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(12);
        $this->Cell(25,4,'DES AFFAIRES ACADEMIQUES',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(20);
        $this->Cell(25,4,'***********************',0,'C',1);

        $this->Ln();

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

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(13);
        $this->Cell(25,4,'SERVICE DE LA SCOLARITE',0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',10);
        $this->Cell(23);
        $this->Cell(25,4,'ET DES EXAMENS ',0,'C',1);


        $this->Ln(23);

        $this->SetFont('Arial','B',13);
        $this->Cell(20);
        $this->Cell(25,4,utf8_encode("LISTE DES ETUDIANTS INSCRITS A L'UNIVERSITE MARIEN N'GOUABI"),0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',13);
        $this->Cell(27);
        $this->Cell(25,4,utf8_encode("__________________________________________________"),0,'C',1);

        $this->Ln(17);

    }
    
    public function body(){
        
        global $tableau;


        $this->SetFillColor(200,200,200);
        $this->SetFont('Arial','B',7);
        $this->Cell(25,10,'ID',1,0,'C',1);
        $this->Cell(35,10,'PRENOM',1,0,'C',1);
        $this->Cell(40,10,'ETABLISSEMENT',1,0,'C',1);
        $this->Cell(30,10,'NIVEAU',1,0,'C',1);
        $this->Cell(30,10,'SOMME',1,0,'C',1);
        $this->Cell(25,10,'ANNEE',1,0,'C',1);
        $this->Ln();

        foreach($tableau as $key => $value):
   
        $this->SetFillColor(200,200,200);
        $this->Cell(25,10,$value['id'],1,0,'C',0);
        $this->Cell(35,10,$value['prenom_etudiant'],1,0,'C',0);
        $this->Cell(40,10,$value['etablissement'],1,0,'C',0);
        $this->SetFont('Arial','B',7);
        $this->Cell(30,10,$value['niveau'],1,0,'C',0);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,10,$value['somme'],1,0,'C',0);
        $this->SetFont('Arial','B',8);
        $this->Cell(25,10,$value['annee'],1,0,'C',0);
    
      
      
        $this->Ln();

        endforeach;

    }

    public function footer(){

    }

}
$pdf=new PDF();
$pdf->SetFont('Arial','B',8);
$pdf->AddPage('P');
$pdf->EN_TETE();
$pdf->body();
$pdf->Output();

?>