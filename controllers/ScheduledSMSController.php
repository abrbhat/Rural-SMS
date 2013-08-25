<?php
/**
 * @copyright 2013 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class ScheduledSMSController extends Controller
{
	public function __construct(Template $template)
	{
		parent::__construct($template);
	}
	public function index()
	{	

	}
	public function update()
	{
		$scheduledSMS= new ScheduledSMS;		
		$scheduledSMS->handleUpdate($_POST);		
		$scheduledSMS= new ScheduledSMS;
		$scheduledSMSList=$scheduledSMS->getArray();		
		$this->template->blocks[]=new Block('scheduledSMSList.inc',array('scheduledSMSList'=>$scheduledSMSList));
	}
	public function sendBurstSMS()
	{
		$scheduledSMS= new ScheduledSMS;		
		$users=QueryRecord::getAllRecords();
		foreach ($users as $user)
		{
			$scheduledSMS->sendSMSfor($user);
		}
		// Executing Simulator for trial
		
		$scheduledSMSDispatchList=$scheduledSMS->markedSMS;
		$this->template->blocks[]=new Block('scheduledSimulatorResponse.inc',array('DispatchList'=>$scheduledSMSDispatchList));
	}
	public function addBlankRow()
	{
		$zend_db = Database::getConnection();
		$data = array('content'=>'Enter SMS here','day'=>1,'month'=>0,'year'=>0);
		$zend_db->insert('scheduled_sms', $data);	
		header('Location: '.BASE_URI.'/scheduledSMS/update');
	}
}
?>
