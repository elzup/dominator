<?php
/* @var $messages string[] */

if (count($messages))
{
	?>
	<div class="row"><div class="col-lg-offset-2 col-lg-8">
			<div class="alerts-div">
				<?php
				foreach ($messages as $mes)
				{
					$type = 'success';
					preg_match('#(?<type>.*):#uU', $mes, $m);
					if ($m) {
						$type = $m['type'];
						$mes = str_replace($type . ':', '', $mes);
					}
					?>
					<div class="alert alert-dismissable alert-<?= $type ?>">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<p><?= $mes ?></p>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
	<?php
} 


