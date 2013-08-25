<?php
/**
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class ScheduledSMS
{
	private $scheduledSMSList=array();
	public $markedSMS=array();
	public function __construct()
	{	
		$zend_db = Database::getConnection();
		$result=$zend_db->query('SELECT id,content,day,month,year FROM scheduled_sms');
		$result=$result->fetchAll();
		foreach($result as $row)
		{
			$this->scheduledSMSList[$row['id']]=array('content'=>$row['content'],'day'=>$row['day'],'month'=>$row['month'],'year'=>$row['year']);
		}
	}
	public function handleUpdate($post)
	{		
		$ids = array_keys(self::getArray());
		foreach ($ids as $id) 
		{
			if (isset($post[$id])) 
			{
				self::set($id,$post[$id]);
			}
			$zend_db = Database::getConnection();
			$result=$zend_db->query('SELECT id,content,day,month,year FROM scheduled_sms');
			$result=$result->fetchAll();
			foreach($result as $row)
				{
					$this->scheduledSMSList[$row['id']]=array('content'=>$row['content'],'day'=>$row['day'],'month'=>$row['month'],'year'=>$row['year']);
				}
			if(isset($post[$id]['checkbox']))
				$n = $zend_db->delete('scheduled_sms', 'id = '.$id);
		}
		
	}
	public function getArray()
	{
		return $this->scheduledSMSList;
	}
	public function set($id,$data)
	{
		$zend_db = Database::getConnection();
		$data = array('content'=>$data['content'],'day'=>(int)$data['day'],'month'=>$data['month'],'year'=>$data['year']);
		$id=$zend_db->quoteInto('id =?',$id);
		$zend_db->update('scheduled_sms', $data, $id);
	}
	public function sendSMSfor($user)
	{
		$date1=new DateTime();
		//Only for simulator
		$date1=$date1->add(new DateInterval('P'.$_GET['days'].'D'));
		foreach ($this->scheduledSMSList as $scheduledSMSId=>$scheduledSMSdata)
		{		
			$date2 = new DateTime($user['dob_of_child']);
			$interval = $date1->diff($date2);	
			if(($interval->y==$scheduledSMSdata['year'])&&($interval->m==$scheduledSMSdata['month'])&&($interval->d==$scheduledSMSdata['day']))
			{	
				self::dispatchSMS($user['phone_number'],$scheduledSMSdata['content']);
			}
		}
	}
	public function dispatchSMS($phoneNumber,$SMScontent)
	{
		/*
			Call to API should be implemented here
		*/

		// Piping SMS to Simulator
			$this->markedSMS[$phoneNumber]=$SMScontent;
	}
	public function removeRows()
	{
		echo var_dump($_POST);
		$zend_db = Database::getConnection();
		$n = $zend_db->delete('scheduled_sms', 'id = '.$id);	
		header('Location: '.BASE_URI.'/scheduledSMS/update');
	}
}
?>
