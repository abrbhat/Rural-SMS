<?php
/**
 * @copyright 2013 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class SMSinterfaceController extends Controller
{
	public function __construct(Template $template)
	{
		parent::__construct($template);
	}
	public function index()
	{
		$incomingSMS=new IncomingSMS;
		unset($_SESSION['SMSErrorMessage']);

		// Check if incoming SMS is valid
		$incomingSMS->isAPIKeyValid();
		$incomingSMS->isKeywordMatched();
		$previousQuery=QueryRecord::getRecord($incomingSMS->getFrom());
		if(!isset($previousQuery))
		{
			$action='generateFirstPageResponse';
		}				
		else
		{
			$action='handleReplySMS';
		}
		$resource='InteractionMode1';
		//Execute the Controller::Action
		$controller = ucfirst($resource).'Controller';
		$c = new $controller($this->template);
		$c->$action();
	}
}	

?>
