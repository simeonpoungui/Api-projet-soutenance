<?php

require('config/db.php');
require('fpdf184/fpdf.php');

$requete = "SELECT * from agents";
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
        $this->Cell(30);
        $this->Cell(25,4,utf8_encode("LISTE DES AGENTS DE L'UNIVERSITE MARIEN N'GOUABI"),0,'C',1);

        $this->Ln();

        $this->SetFont('Arial','B',13);
        $this->Cell(40);
        $this->Cell(25,4,utf8_encode("_________________________________________"),0,'C',1);

        $this->Ln(17);

    }
    
    public function body(){
        
        global $tableau;


        $this->SetFillColor(200,200,200);
        $this->SetFont('Arial','B',7);
        $this->Cell(10,10,'ID',1,0,'C',1);
        $this->Cell(40,10,'NOM',1,0,'C',1);
        $this->Cell(30,10,'PRENOM',1,0,'C',1);
        $this->Cell(50,10,'EMAIL',1,0,'C',1);
        $this->Cell(30,10,'NATIONALITE',1,0,'C',1);
        $this->Cell(30,10,'ROLE',1,0,'C',1);
        $this->Ln();

        foreach($tableau as $key => $value):
   
        $this->SetFillColor(200,200,200);
        $this->Cell(10,10,$value['id'],1,0,'C',0);
        $this->Cell(40,10,$value['nom_agent'],1,0,'C',0);
        $this->Cell(30,10,$value['prenom_agent'],1,0,'C',0);
        $this->SetFont('Arial','B',7);
        $this->Cell(50,10,$value['email'],1,0,'C',0);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,10,$value['nationalite'],1,0,'C',0);
        $this->SetFont('Arial','B',8);
        $this->Cell(30,10,$value['role'],1,0,'C',0);
      
      
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