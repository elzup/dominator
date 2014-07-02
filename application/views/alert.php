<?php
/* @var $messages string[] */

if (count($messages))
{
	?>
	<div class="row"><div class="col-lg-offset-2 col-lg-8">
			<div class="alerts-div">
				<?php
				foreach ($messages as $m)
				{
					?>
					<div class="alert alert-dismissable alert-info">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<p><?= $m ?></p>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
	<?php
} 


