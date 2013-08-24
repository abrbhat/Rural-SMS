<?php
/**
 * @copyright 2007-2012 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 * @param language $this->scheduledSMSList
 */
echo var_dump($this->scheduledSMSList);
echo '</br>';
?>


<div class="container">
	<h2>Scheduled SMS</h2>
	<form method="post" action="<?php echo $_SERVER['REDIRECT_URL']; ?>" class='form-horizontal'>
		<fieldset>
		<?php	
		$html='<table class="table">';
		foreach ($this->scheduledSMSList as $scheduledSMS)
		{
			echo var_dump($scheduledSMS);
			$html.='<tr><td>
			        <input name="['.$id.'][content]" class="form-control" id="['.$id.'][content]" value="'.View::escape($this->scheduledSMSList[$id]['content']).'" /></td>';
			$html.='<td>
			        <input name="['.$id.'][day]" class="form-control" id="['.$id.'][day]" value="'.View::escape($this->scheduledSMSList[$id]['day']).'" /></td>';
			$html.='<td>
			        <input name="['.$id.'][month]" class="form-control" id="['.$id.'][month]" value="'.View::escape($this->scheduledSMSList[$id]['month']).'" /></td>';
			$html.='<td>
			        <input name="['.$id.'][year]" class="form-control" id="['.$id.'][year]" value="'.View::escape($this->scheduledSMSList[$id]['year']).'" /></td>';
			$html.='</tr>';       
			
		}
			$html.='</table>';
		echo $html;
		?>		

		<button type="submit" class="btn btn-primary">Submit</button>
			<?php
				if (isset($_REQUEST['return_url'])) {
					$return_url = urlencode($_REQUEST['return_url']);
				}
				
				else {
					$return_url = BASE_URI.'/scheduledSMS/update';
				}

				$onclick = isset($_REQUEST['callback'])	? 'onclick="self.close();"': '';
				echo "<a class=\"btn btn-default\" href=\"$return_url\" $onclick>Cancel</a>";
			?>
	</form>
</div>
<p></p>
