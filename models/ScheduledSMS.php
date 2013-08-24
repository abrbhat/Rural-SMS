<?php
/**
 * @copyright 2009-2013 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class ScheduledSMS
{
	private $scheduledSMSList=array();
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
}
?>
