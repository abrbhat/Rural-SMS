<?php
/**
 * @copyright 2007-2012 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 * @param language $this->scheduledSMSList
 */

?>


<div class="container">
	<h2>Scheduled SMS</h2>
	<form method="post" action="<?php echo $_SERVER['REDIRECT_URL']; ?>">
		<?php	
		$html='<table class="table" id="SMStable">';
		$html.='<tr><td>SMS Content</td>
			<td>Day</td>
			<td>Month</td>
			<td>Year</td>
			<td><button type="submit" class="btn btn-danger">Remove</button></td></tr>';
		foreach ($this->scheduledSMSList as $scheduledSMSid=>$scheduledSMSdata)
		{
			$html.='<tr><td>
			        <input name="'.$scheduledSMSid.'[content]" class="form-control" id="listContent" value="'.View::escape($scheduledSMSdata['content']).'" /></td>';
			$html.='<td>
			        <select name="'.$scheduledSMSid.'[day]" class="form-control" >';
			for($i=1;$i<=31;$i++)
			{	
				if($i!=$scheduledSMSdata['day'])
					$html.='<option value='.$i.'>'.$i.'</option>';
				else
					$html.='<option value='.$i.' selected>'.$i.'</option>';
			}	
			$html.=	'</select></td>';
			$html.='<td>
			        <select name="'.$scheduledSMSid.'[month]" class="form-control" value="'.$scheduledSMSdata['month'].'" >';
			for($i=0;$i<=12;$i++)
			{	
				if($i!=$scheduledSMSdata['month'])
					$html.='<option value='.$i.'>'.$i.'</option>';
				else
					$html.='<option value='.$i.' selected>'.$i.'</option>';
			}	
			$html.=	'</select></td>';
			$html.='<td>
			<select name="'.$scheduledSMSid.'[year]" class="form-control" value="'.$scheduledSMSdata['year'].'" >';
			for($i=0;$i<=10;$i++)
			{	
				if($i!=$scheduledSMSdata['year'])
					$html.='<option value='.$i.'>'.$i.'</option>';
				else
					$html.='<option value='.$i.' selected>'.$i.'</option>';
			}	
			$html.=	'</select></td>';
			$html.='<td><input type="checkbox" value="y" name="'.$scheduledSMSid.'[checkbox]"></td>';
			$html.='</tr>';       
		}
		$html.='</table>';
		echo $html;
		?>		
		<a href="<?php echo BASE_URI.'/scheduledSMS/addBlankRow';?>">Add Another Row</a>
		<button type="submit" class="btn btn-success">Submit</button>
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
