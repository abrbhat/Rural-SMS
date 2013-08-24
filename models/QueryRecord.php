<?php
/**
 * @copyright 2009-2013 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
class QueryRecord
{
	protected $tablename = 'query_record';
	protected $data=array();
	public static function save($previous_page,$dob=NULL,$location=NULL)
	{
		$incomingSMS=new IncomingSMS;
		$from=$incomingSMS->getFrom();
		$zend_db = Database::getConnection();
		$data = array(
		    'previous_page'   => $previous_page,
		    'dob_of_child' => $dob,
		    'location' => $location,
		    'phone_number' => $from
		);
		$sql = 'select * from query_record where phone_number=?';
		$result = $zend_db->fetchRow($sql, $from);
		if(!isset($_SESSION['SMSErrorMessage']))
		{
			if($result)
			{
				$phone_number=$zend_db->quoteInto('phone_number =?',$from);
				$zend_db->update('query_record', $data, $phone_number);
			}
			else
			{		
				$zend_db->insert('query_record', $data);
			}
		}	
	}
	public static function getRecord($phone_number)
	{
		$zend_db = Database::getConnection();
		$sql = 'select * from query_record where phone_number=?';
		$result = $zend_db->fetchRow($sql, $phone_number);
		if($result)
		{
			return $result;
		}
		else
		{		
			return NULL;
		}	
	}
	public static function getAllRecords()
	{
		$zend_db = Database::getConnection();
		$sql = 'select * from query_record';
		$result = $zend_db->fetchAll($sql);
		if($result)
		{
			return $result;
		}
		else
		{		
			return NULL;
		}	
	}
}

?>
