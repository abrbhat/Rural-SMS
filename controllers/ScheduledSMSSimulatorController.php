<?php
/**
 * @copyright 2007-2012 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @author Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */

class ScheduledSMSSimulatorController extends Controller
{
	public function __construct(Template $template)
	{	
		parent::__construct($template);
	}
	public function index()
	{
		$this->template->blocks[]=new Block('scheduledSMSSimulator.inc');	
	}
}
?>
