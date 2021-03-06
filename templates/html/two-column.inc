<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<?php
	$this->layout = 'two-column';
	include __DIR__.'/partials/header.inc';
?>
<body>
	<?php
		include __DIR__.'/partials/banner.inc';
	?>
	<div id="panel-container">
		<?php
			include __DIR__.'/partials/panel-one.inc';
		?>
		<div id="content-panel">
			<?php
				include FRAMEWORK.'/errorMessages.php';
				echo $this->includeBlocks();
			?>
		</div>
	</div>
	<?php
		include __DIR__.'/partials/footer.inc';
	?>
</body>
</html>
<?php
	include __DIR__.'/partials/garbageCollection.inc';
?>
