<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<body>
<div class='container'>
	<?php
		$dir = dirname(__FILE__);
		include $dir.'/partials/header.inc';
		include $dir.'/partials/banner.inc';
		include $dir.'/partials/navbar.inc';
		include FRAMEWORK.'/errorMessages.php';
		echo $this->includeBlocks();
	?>
</div>		
</body>
</html>
<?php
	include $dir.'/partials/garbageCollection.inc';
?>
