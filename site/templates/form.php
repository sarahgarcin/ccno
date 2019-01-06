<?php snippet('header') ?>
<?php date_default_timezone_set('Europe/Paris');?>

<div class ="row">

	<?php snippet('left-col') ?>
	<?php snippet('menu') ?>
	<main class="small-18 medium-13 medium-push-4 xlarge-push-4 xlarge-13 end columns">
		<div class="main-content">
			<div class="arrow-back">
				<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
					<
				</a>
			</div>
			<h1><?= $page->title()->html() ?></h1>
			<div class="row">
				<div class="text icones-wrapper-text small-18 medium-16 medium-push-2 large-11 large-push-2 xlarge-8 columns">
					<?php if($form->success()): ?>
					  <div class="form-success">
					  	<p>Le formulaire de demande de prêt de studio et accueil studio a bien été envoyé.</p>
					  </div>
					<?php elseif($form->error()): ?>
						<div class="form-error">
					  	<p><?php snippet('uniform/errors', ['form' => $form]); ?></p>
					  </div>
					<?php endif; ?>
					<?php echo $page->text()->kirbytext() ?>
					<!-- <h2>Formulaire de demande</h2> -->
					<form enctype="multipart/form-data" action="<?php echo $page->url() ?>" method="POST">
						<label for='name'>Nom du porteur de projet* <br> <i>Last name of the artist*</i></label>
					  <input name="name" type="text" value="<?php echo $form->old('name'); ?>" required>
					  <label for='firstname'>Prénom du porteur de projet* <br> <i>First name of the artist*</i></label>
					  <input required name="firstname" type="text" value="<?php echo $form->old('firstname'); ?>">
					  <label for='structurename'>Nom de la structure / compagnie <br><i>Name of the structure / company</i></label>
					  <input name="structurename" type="text" value="<?php echo $form->old('structurename'); ?>">
					  <label for='contact'>Contact administration (nom, prénom)* <br><i>Administration contact (last name, first name)*</i></label>
					  <input required name="contact" type="text" value="<?php echo $form->old('contact'); ?>">
					  <label for='region'>Région d’implantation* <br><i>Region of origin*</i></label>
					  <input required name="region" type="text" value="<?php echo $form->old('region'); ?>">
					  <label for='adresse'>Adresse du siège social* <br><i>Registered address*</i></label>
					  <input required name="adresse" type="text" value="<?php echo $form->old('adresse'); ?>">
					  <label for='telephone1'>Téléphone 1* <br> <i>Phone 1*</i></label>
					  <input required name="telephone1" type="tel" value="<?php echo $form->old('telephone1'); ?>">
					  <label for='telephone2'>Téléphone 2 <br> <i>Phone 2</i></label>
					  <input name="telephone2" type="tel" value="<?php echo $form->old('telephone2'); ?>">
					  <label for='email1'>Email 1*</label>
					  <input required name="email1" type="email" value="<?php echo $form->old('email1'); ?>">
					  <label for='email2'>Email 2</label>
					  <input name="email2" type="email" value="<?php echo $form->old('email2'); ?>">
					  <label for='titre'>Titre du projet* <br><i>Project title*</i></label>
					  <input required name="titre" type="text" value="<?php echo $form->old('titre'); ?>">
					  <label for='distribution'>Distribution complète* <br><i>Casting*</i></label>
					  <textarea required name="distribution"><?php echo $form->old('distribution'); ?></textarea>
					  <label for='periode'>Période(s) de travail en studio demandée(s)* <br><i>Required studio work period(s)*</i></label>
					  <textarea required name="periode"><?php echo $form->old('periode'); ?></textarea>
					  <label for='nombrepersonne'>Nombre de personnes en résidence pour la ou les période(s) de travail en studio demandée(s)* <br><i>Number of persons in residence for the required studio work period(s)*</i></label>
					  <input required name="nombrepersonne" type="text" value="<?php echo $form->old('nombrepersonne'); ?>">
					  <label for='calendrier'>Calendrier de création* <br><i>Creation calendar*</i></label>
					  <textarea required name="calendrier"><?php echo $form->old('calendrier'); ?></textarea>
					  <label for='budget'>Montant du budget de création* <br><i>Total budget of the project*</i></label>
					  <input required name="budget" type="text" value="<?php echo $form->old('budget'); ?>">
					  <label for='aide'>Montant de l’aide sollicitée* <br><i>Grant requested*</i></label>
					  <input required name="aide" type="text" value="<?php echo $form->old('aide'); ?>">
					  <label for='coproductions'>Coproductions et dates envisagées et confirmées* <br><i>Coproductions  and tour dates (planned and confirmed)*</i></label>
					  <textarea required name="coproductions"><?php echo $form->old('coproductions'); ?></textarea>
					  <label for='liensvideos'>Liens vidéo d’extraits du projet* <br><i>Video links of project excerpts*</i></label>
					  <textarea required name="liensvideos"><?php echo $form->old('liensvideos'); ?></textarea>
					 	
					 	<label for="presentation">Pièce-jointe 1 — Dossier de présentation du projet (distribution, note d’intention, biographies…)* <br><i>Attachment 1 - Project presentation (distribution, note of intent, biographies…)*</i><br>[PDF] [max 10Mo]</label>
	    			<input type="file" name="presentation" required/>
	    			<label for="budgetpdf">Pièce-jointe 2 — Dossier présentant le budget* <br><i>Attachment 2 - The budget*</i><br>[PDF] [max 5Mo]</label>
	    			<input type="file" name="budgetpdf" required/>
	    			<style type="text/css" media="screen">
	    				.uniform__potty {
							  position: absolute !important;
							  left: -9999px !important;
							}
	    			</style>
					  <?php echo csrf_field(); ?>
					  <?php echo honeypot_field(); ?>
					  <input type="submit" value="Envoyer">
					</form>

				</div>
			</div>
			<?php //if no errors carry on
		    if($form->success()){
		    	$jsonfile = kirby()->roots()->site().'/messages.log'; 
		    	$csvfile = kirby()->roots()->site()."/demandes-accueil-studio.csv";

		    	snippet('uniform/log-csv');
		    	// $json_str = file_get_contents($jsonfile);
		    	// $json_obj = json_decode($json_str, true);
		    	// print('json file: '.$jsonfile.'<br>'.'json string: '.$json_str.'<br>');
		    	// echo '<pre>JSON OBJ' . print_r($json_obj, true) . '</pre>';

					// $fp = fopen($csvfile, 'w');

					// foreach ($json_obj as $fields) {
					//     fputcsv($fp, $fields);
					// }

					// fclose($fp);	


				}
			?>
		</div>
	</main>

	
</div>


<?php snippet('footer') ?>

