<?php date_default_timezone_set('Europe/Paris');?>
<?php // open the file "demosaved.csv" for writing
$csvfile = kirby()->roots()->content()."/demande-accueil-studio//demandes-accueil-studio.csv";

$file = fopen($csvfile, 'a');

//echo '<pre>DATA — ' . print_r($form->data(), true) . '</pre>';
 
// save the column headers
// fputcsv($file, array('Nom du porteur de projet', 'Prénom du porteur de projet', 'Nom de la structure', 'Région d’implantation', 'Contact administration', 'Adresse', 'Téléphone 1', 'Téléphone 2', 'Email 1', 'Email 2', 'Titre du projet', 'Distribution', 'Période(s)', 'Nombre de personnes', 'Calendrier', 'Montant Budget', 'Coproductions et dates', 'Liens vidéo', 'PJ1 - Présentation', 'PJ2 - Budget' ));
 
 // date("d/m/Y - h:i")

// Sample data. This can be fetched from mysql too
$data = array(
array($form->data('name'), $form->data('firstname'), $form->data('structurename'), $form->data('region'), $form->data('contact'), $form->data('adresse'), $form->data('telephone1'), $form->data('telephone2'), $form->data('email1'), $form->data('email2'), $form->data('titre'), $form->data('distribution'), $form->data('periode'), $form->data('nombrepersonne'), $form->data('calendrier'), $form->data('budget'), $form->data('aide'), $form->data('coproductions'), $form->data('liensvideos'), 'http://www.ccn-orleans.com/content/demande-accueil-studio/'.$form->data('presentation')['name'],  'http://www.ccn-orleans.com/content/demande-accueil-studio/'.$form->data('budgetpdf')['name'], date("d/m/Y - H:i"))
);
 
// save each row of the data
foreach ($data as $row){
	fputcsv($file, $row);
}
 
// Close the file
fclose($file);