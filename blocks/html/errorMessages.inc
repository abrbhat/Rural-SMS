<?php
/**
 * @copyright 2007-2012 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Cliff Ingham <inghamn@bloomington.in.gov>
 * @param array $this->errorMessages
 */
?>
<div id="errorMessages">
	<h2>Sorry</h2>
	<?php
		foreach ($this->errorMessages as $e) {
			$error = $e->getMessage();
			if (file_exists(APPLICATION_HOME."/blocks/html/errorMessages/$error.inc")) {
				include APPLICATION_HOME."/blocks/html/errorMessages/$error.inc";
			}
			else {
				echo "<p>$error</p>";
			}
		}
	?>
</div>