<?php if($site->alert()->isNotEmpty()):?>
	<div class="modal-alert">
		<div class="modal-content">
			<span class="close-modal">&times;</span>
			<div class="modal-inner-content">
				<?php echo $site->alert()->kt()?>
			</div>
		</div>
	</div>
<?php endif; ?>