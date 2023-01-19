<?php

// appel du framework (documentation : https://www.fpdf.org/fr/doc/)
require(PATH_ASSETS.'/fpdf185/fpdf.php');

// Création du PDF
$pdf = new FPDF();

// Nom du fichier
$pdf->SetTitle(utf8_decode('Données enregistrées'));
// Ajout de page
$pdf->AddPage();

// Titre du document
$pdf->SetFont('Arial','B',20);
$pdf->Image(PATH_IMAGES.'/logo_ttp2.png', 87, 5, -300);
$pdf->Text(65, 55, utf8_decode('Vos données enregistrées'));
$pdf->Ln(60);

// Partie 1 : Données enregistrées
$pdf->SetFont('Arial','U', 16);
$pdf->Cell(0, 0, utf8_decode('Informations de compte :'));
$pdf->Ln(10);

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Cell(0, 0, utf8_decode(' - Identifiant : '.$utilisateur['idUtilisateur']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Nom utilisateur : '.$utilisateur['pseudoUtilisateur']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Adresse mail : '.$utilisateur['mail']));
$pdf->Ln(8);
$pdf->Cell(0, 0, utf8_decode(' - Date de création du compte : '.date("d/m/Y",strtotime($utilisateur['dateCreation']))));
$pdf->Ln(15);

// Partie 2 : Préférences
$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Préférences enregistrées :'));

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode("- Catégories : ". $prefCategorieFetch));
$pdf->Write(6, utf8_decode("\n\n- Ingrédients : ". $prefIngredientsFetch));
$pdf->Ln(15);

// Partie 3 : Plats ajoutés
$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Plats ajoutés :'));

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($platsAjoutesFetch));
$pdf->Ln(15);

// Partie 4 : Plats favoris
$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Plats favoris :'));

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($platsFavorisFetch));
$pdf->Ln(15);

// Partie 5 : Plats favoris
$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Évènements participés :'));

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($eventsParticipesFetch));
$pdf->Ln(15);

// Partie 6 : Succès
$pdf->SetFont('Arial','U',16);
$pdf->Cell(0, 0, utf8_decode('Succès :'));

// Contenu
$pdf->SetFont('Arial','',12);
$pdf->Write(6, utf8_decode($succesFetch));
$pdf->Ln(15);

$pdf->Output();