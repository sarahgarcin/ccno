	<?php snippet('header') ?>
	<?php date_default_timezone_set('Europe/Paris');?>

	<div>
		<?php snippet('menu') ?>

		<main class="row">
			<?php snippet('left-col') ?>
			<div class="form_main col-xs-12 col-sm-11 col-sm-offset-1 col-md-9 col-md-offset-1">
				<div class="main-content">
					<div class="arrow-back">
						<a href="" onclick="window.history.go(-1); return false;" title="<?php echo $page->parent()->title()?>">
							<
						</a>
					</div>
					<h1 class="main-content_title col-xs-12"><?= $page->title()->html() ?></h1>
					<?php snippet('icone-page')?>
					<div class="row">
						<div class="text col-xs-12 col-md-7 col-md-offset-1">
							<?php if($form->success()): ?>
							  <div class="form-success">
							  	<p>Votre demande a bien été envoyée.<br>
							  		<em>Your resquet has been sent.</em>
							  	</p>
							  </div>
							<?php elseif($form->error()): ?>
								<div class="form-error">
							  	<p><?php snippet('uniform/errors', ['form' => $form]); ?></p>
							  </div>
							<?php endif; ?>
							<?php echo $page->text()->kirbytext() ?>
							<form enctype="multipart/form-data" action="<?php echo $page->url() ?>" method="POST">
								<br>
								<h5>Champs à remplir / <i>Mandatory fields</i></h5>
								<br>
								<label for='lastname'>Nom de l’enfant* / <i>Child name*</i></label>
							  <input name="lastname" type="text" value="<?php echo $form->old('lastname'); ?>" required>
							  <label for='firstname'>Prénom de l’enfant* / <i>Child first name*</i></label>
							  <input required name="firstname" type="text" value="<?php echo $form->old('firstname'); ?>">
							  <label for='birthdate'>Âge de l’enfant* / <i>Child age*</i></label>
							  <input name="birthdate" type="text" value="<?php echo $form->old('birthdate'); ?>" required>
							  <br>
							  <label for='responsable'>Nom du responsable légal* / <i>Name of the person in charge*</i></label>
							  <input name="responsable" type="text" value="<?php echo $form->old('responsable'); ?>" required>
							  <label for='responsablefirst'>Prénom du responsable légal* / <i>First name of the person in charge*</i></label>
							  <input name="responsablefirst" type="text" value="<?php echo $form->old('responsablefirst'); ?>" required>
							  <label for='email'>Email*</label>
							  <input required name="email" type="email" value="<?php echo $form->old('email'); ?>">
							  <label for='phone'>Téléphone* / <i>Phone number*</i></label>
							  <input required name="phone" type="tel" value="<?php echo $form->old('phone'); ?>">
							  <br>
							  <label for='danse'>Expliquez la pratique de la danse de votre enfant, du krump en particulier* / <i>Explain your child's dance practice, especially krump*</i></label>
							  <textarea required name="danse"><?php echo $form->old('danse'); ?></textarea>
							  <p>Choix de la date de l’audition* / <i>Select audition date*</i></p>
								<div>
								  <input type="radio" id="orleans" name="auditiondate" value="Dimanche 7 novembre à Orléans" checked>
								  <label for="orleans">Dimanche 7 novembre à Orléans</label>
								</div>
								<div>
								  <input type="radio" id="paris" name="auditiondate" value="Samedi 20 novembre à Paris">
								  <label for="paris">Samedi 20 novembre à Paris</label>
								</div>

								<p>Êtes-vous disponibles sur l’ensemble des périodes de répétitions?* / <i>Are you available during all the rehearsal periods?*</i></p>
								<div>
								  <input type="radio" id="repetyes" name="repet" value="Oui" checked>
								  <label for="repetyes">Oui</label>
								</div>
								<div>
								  <input type="radio" id="repetno" name="repet" value="Non">
								  <label for="repetno">Non</label>
								</div>
							  <br>
							 	<h5>Pièces à joindre / <i>Documents to attach</i></h5>
							 	<br>
			    			<label for="picture">PHOTO de l’enfant pour le trombinoscope (photo d’identité)* — [JPG/PNG/PDF] [max 5Mo]</label>
			    			<input type="file" name="picture" required/>
			    			<label for='liensvideos'>VIDEO dansée de votre enfant (lien web, Youtube, Viméo…)*</label>
							  <textarea required name="liensvideos"><?php echo $form->old('liensvideos'); ?></textarea>
							  <!-- <label for="docs">Autres documents que vous souhaiteriez nous transmettre — [JPG/PNG/PDF] [max 5Mo]</label>
			    			<input type="file" name="docs"/> -->

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
				    if($form->success()):
				    	$jsonfile = kirby()->roots()->site().'/messages.log'; 
				    	$csvfile = kirby()->roots()->site()."/auditions-2022/auditions-2022.csv";

				    	snippet('uniform/log-csv-2022');
						else: 
							snippet('uniform/errors', ['form' => $form]);
						endif; 
					?>
				</div>
			</div>
		</main>

		
	</div>


	<?php snippet('footer') ?>

