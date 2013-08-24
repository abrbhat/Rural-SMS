<?php
/**
 * @copyright 2007-2012 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 * @param ConfigurationList $this->configurationList
 */

?>


<div class="container">
	<h2>Configuration Panel</h2>
	<form method="post" action="<?php echo $_SERVER['REDIRECT_URL']; ?>" class='form-horizontal'>
		<fieldset><legend>Configuration</legend>
			
		<div class='form-group'>
			<label for="SMSCharacterLimit" class="col-lg-2 control-label">SMS Character Limit</label></td>
		
			<div class='col-lg-10'>			
			<input name="SMSCharacterLimit" class="form-control" id="SMSCharacterLimit" value="<?php echo View::escape($this->configurationList['SMSCharacterLimit']); ?>" />
			</div>	
		</div>	
	
		<div class='form-group'>
			<label for="useSMSKeyword" class="col-lg-2 control-label">Use SMS Keyword?</label></td>
			<div class='col-lg-10'>	
				<label class="radio-inline">
					<input type="radio" name="useSMSKeyword" id="Yes" value="Yes" <?php  if(View::escape($this->configurationList['useSMSKeyword'])=='Yes') echo 'checked' ;?>>Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="useSMSKeyword" id="No" value="No" <?php  if(View::escape($this->configurationList['useSMSKeyword'])=='No') echo 'checked' ;?>>No
				</label>		
			</div>	
		</div>	
		
		<div class='form-group'>
			<label for="SMSKeyword" class="col-lg-2 control-label">SMS Keyword</label>
			<div class='col-lg-10'>			
			<input name="SMSKeyword" class="form-control" id="SMSKeyword" value="<?php echo View::escape($this->configurationList['SMSKeyword']) ?>" />
			</div>	
		</div>	
					
		<div class='form-group'>
			<label for="SMSResponseFormat" class="col-lg-2 control-label">SMS Response Format</label>
			<div class='col-lg-10'>	
				<label class="radio-inline">
					<input type="radio" name="SMSResponseFormat" id="html" value="html" <?php  if(View::escape($this->configurationList['SMSResponseFormat'])=='html') echo 'checked' ;?>>HTML
				</label>
				<label class="radio-inline">
					<input type="radio" name="SMSResponseFormat" id="xml" value="xml" <?php  if(View::escape($this->configurationList['SMSResponseFormat'])=='xml') echo 'checked' ;?>>XML
				</label>		
			</div>	
		</div>	

		<div class='form-group'>
			<label for="SMSBodyParameter" class="col-lg-2 control-label">SMS Body Parameter</label>
			<div class='col-lg-10'>			
			<input name="SMSBodyParameter" class="form-control" id="SMSBodyParameter" value="<?php echo View::escape($this->configurationList['SMSBodyParameter']); ?>" />
			</div>	
		</div>	
			
		<div class='form-group'>		
			<label for="SMSFromParameter" class="col-lg-2 control-label">SMS From Parameter</label>
			<div class='col-lg-10'>			
			<input name="SMSFromParameter" class="form-control" id="SMSFromParameter"  value="<?php echo View::escape($this->configurationList['SMSFromParameter']); ?>" />
			</div>	
		</div>	
			
		<div class='form-group'>		
			<label for="APIKeyRequired" class="col-lg-2 control-label">Is API Key Required?</label></td>
			<div class='col-lg-10'>	
				<label class="radio-inline">
					<input type="radio" name="APIKeyRequired" id="Yes" value="Yes" <?php  if(View::escape($this->configurationList['APIKeyRequired'])=='Yes') echo 'checked' ;?>>Yes
				</label>
				<label class="radio-inline">
					<input type="radio" name="APIKeyRequired" id="No" value="No" <?php  if(View::escape($this->configurationList['APIKeyRequired'])=='No') echo 'checked' ;?>>No
				</label>		
			</div>	
		</div>	
			
		<div class='form-group'>		
			<label for="SMSAPIKeyParameter" class="col-lg-2 control-label">SMS API Key Parameter</label></td>
			<div class='col-lg-10'>				
			<input name="SMSAPIKeyParameter" class="form-control" id="SMSAPIKeyParameter" value="<?php echo View::escape($this->configurationList['SMSAPIKeyParameter']); ?>" />
			</div>	
		</div>	
			
		<div class='form-group'>		
			<label for="SMSAPIKey" class="col-lg-2 control-label">SMS API Key</label></td>
			<div class='col-lg-10'>			
			<input name="SMSAPIKey" class="form-control" id="SMSAPIKey" value="<?php echo View::escape($this->configurationList['SMSAPIKey']); ?>" />
			</div>	
		</div>	
		
		<div class='form-group'>
			<label for="language" class="col-lg-2 control-label">Language</label></td>
			<div class='col-lg-10'>
			<input name="language" class="form-control" id="language" value="<?php echo View::escape($this->configurationList['language']); ?>" />
			</div>	
		</div>	
		</fieldset>
<fieldset><legend>Submit</legend>
			<button type="submit" class="btn btn-primary">Submit</button>
			<?php
				if (isset($_REQUEST['return_url'])) {
					$return_url = urlencode($_REQUEST['return_url']);
				}
				
				else {
					$return_url = BASE_URL.'/configuration/update';
				}

				$onclick = isset($_REQUEST['callback'])	? 'onclick="self.close();"': '';
				echo "<a class=\"btn btn-default\" href=\"$return_url\" $onclick>Cancel</a>";
			?>
		</fieldset>
	</form>
</div>
<p></p>
