<?php
/**
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class InteractionMode1Controller extends SMSController
{
	public function index()
	{
		
		
	}
	public function __construct(Template $template)
	{
		parent::__construct($template);
	}	
	public function generateFirstPageResponse()
	{	
		$page='1';
		$response1='Reply with date of birth of child(dd-mm-yyyy)';
		QueryRecord::save($page);
		$this->template->smsBlocks['content']=$response1;		
	}
	public function handleReplySMS()
	{
		$list=array();
		$incomingSMS=new IncomingSMS;
		$previousQuery=QueryRecord::getRecord($incomingSMS->getFrom());
		$response2='Reply with your village/town/city.';
		$response3='Your child has been registered with the information program.';
		$page=$previousQuery['previous_page'];
		$string=$incomingSMS->getQueryText();
		switch ($previousQuery['previous_page'])
		{
			case 1:
				if(preg_match('/^(([0-9][0-9])-([0-9][0-9])-([0-9][0-9][0-9][0-9]))$/i',$string,$matches))
				{
					$response=$response2;
					$dateOfBirth=$matches[4].'-'.$matches[3].'-'.$matches[2];
					$location=NULL;
				}
				else
				{
					$_SESSION['SMSErrorMessage'][]='You have sent an incorrect response';
					return;
				}
				break;
			case 2:
				$dateOfBirth=$previousQuery['dob_of_child'];
				$location=$incomingSMS->getQueryText();
				$response=$response3;
				break;
			default:
				$_SESSION['SMSErrorMessage'][]='Invalid Response';
				return;
		}	
		$page++;	
		QueryRecord::save($page,$dateOfBirth,$location);
		$this->template->smsBlocks['content']=$response;	
	}	
}
