<?php
require(PATH_ASSETS.'/fpdf185/fpdf.php');

$pdf = new FPDF();
$pdf->SetTitle(utf8_decode('Données enregistrées'));
$pdf->AddPage();

$pdf->SetFont('Arial','B',20);
$pdf->Image(PATH_IMAGES.'/logo_ttp2.png', 87, 5, -300);
$pdf->Text(65, 55, utf8_decode('Vos données enregistrées'));
$pdf->Ln(60);

$pdf->SetFont('Arial','U', 16);
$pdf->Cell(0, 0, utf8_decode('Informations de compte :'));
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(0, 0, utf8_decode(' - Identifiant : '.$utilisateur[0]['idUtilisateur']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Nom utilisateur : '.$utilisateur[0]['pseudoUtilisateur']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Adresse mail : '.$utilisateur[0]['mail']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Date de création du compte : '.date("d/m/Y",strtotime($utilisateur[0]['dateCreation']))));
$pdf->Ln(15);

$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Préférences enregistrées :'));

$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode("- Catégories : ". $prefCategorieFetch));
$pdf->Write(6, utf8_decode("\n\n- Ingrédients : ". $prefIngredientsFetch));
$pdf->Ln(15);

$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Plats ajoutés :'));

$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($platsAjoutesFetch));
$pdf->Ln(15);

$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Plats favoris :'));

$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($platsFavorisFetch));
$pdf->Ln(15);

$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Évènements participés :'));

$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($eventsParticipesFetch));
$pdf->Ln(15);

$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Succès :'));

$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($succesFetch));
$pdf->Ln(15);

$pdf->Output();