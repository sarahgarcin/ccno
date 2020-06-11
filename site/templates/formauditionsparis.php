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
							<label for='firstname'>Prénom* / <i>First name*</i></label>
						  <input name="firstname" type="text" value="<?php echo $form->old('firstname'); ?>" required>
						  <label for='lastname'>Nom* / <i>Name*</i></label>
						  <input required name="lastname" type="text" value="<?php echo $form->old('lastname'); ?>">
						  <label for='birthdate'>Date de naissance* / <i>Date of birth*</i></label>
						  <input name="birthdate" type="text" value="<?php echo $form->old('birthdate'); ?>" required>
						  <label for='email'>Email*</label>
						  <input required name="email" type="email" value="<?php echo $form->old('email'); ?>">
						  <br>
						 	<h5>Pièces à joindre / <i>Documents to attach</i></h5>
						 	<br>
						 	<label for="cv">CV* / <i>Resume*</i> — [PDF] [max 5Mo]</label>
		    			<input type="file" name="cv" required/>
		    			<label for="picture">1 PHOTO* / <i>1 picture*</i> — [JPG] [max 5Mo]</label>
		    			<input type="file" name="picture" required/>
		    			<label for='liensvideos'>Liens vidéo* / <i>Video links*</i></label>
						  <textarea required name="liensvideos"><?php echo $form->old('liensvideos'); ?></textarea>

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
			    	$csvfile = kirby()->roots()->site()."/auditions-paris/auditions-paris.csv";

			    	snippet('uniform/log-csv-paris');
					else: 
						snippet('uniform/errors', ['form' => $form]);
					endif; 
				?>
			</div>
		</div>
	</main>

	
</div>


<?php snippet('footer') ?>

