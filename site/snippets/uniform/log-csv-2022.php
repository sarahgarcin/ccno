<?php date_default_timezone_set('Europe/Paris');?>
<?php // open the file "demosaved.csv" for writing
$csvfile = kirby()->roots()->content()."/auditions-2022/auditions-2022.csv";

$file = fopen($csvfile, 'a');

// Sample data. This can be fetched from mysql too
$data = array(
array($form->data('lastname'), $form->data('firstname'), $form->data('birthdate'), $form->data('responsable'),  $form->data('responsablefirst'), $form->data('email'), $form->data('phone'), $form->data('danse'), $form->data('auditiondate'), $form->data('repet'), $form->data('liensvideos'),  'http://www.ccn-orleans.com/content/auditions-2022/'.$form->data('picture')['name'], 
	// 'http://www.ccn-orleans.com/content/auditions-paris/'.$form->data('docs')['name'], 
	date("d/m/Y - H:i"))
);
 
// save each row of the data
foreach ($data as $row){
	fputcsv($file, $row);
}

 
// Close the file
fclose($file);