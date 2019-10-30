<?php date_default_timezone_set('Europe/Paris');?>
<?php // open the file "demosaved.csv" for writing
$csvfile = kirby()->roots()->content()."/auditions-bruxelles/auditions-bruxelles.csv";

$file = fopen($csvfile, 'a');

// Sample data. This can be fetched from mysql too
$data = array(
array($form->data('lastname'), $form->data('firstname'), $form->data('birthdate'), $form->data('email'), $form->data('liensvideos'), 'http://www.ccn-orleans.com/content/auditions-bruxelles/'.$form->data('cv')['name'],  'http://www.ccn-orleans.com/content/auditions-bruxelles/'.$form->data('picture')['name'], date("d/m/Y - H:i"))
);
 
// save each row of the data
foreach ($data as $row){
	fputcsv($file, $row);
}
 
// Close the file
fclose($file);