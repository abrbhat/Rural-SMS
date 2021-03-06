<?php
/**
 * @copyright 2013 City of Bloomington, Indiana
 * @license http://www.gnu.org/licenses/agpl.txt GNU/AGPL, see LICENSE.txt
 * @authors Cliff Ingham <inghamn@bloomington.in.gov>,Abhiroop Bhatnagar <bhatnagarabhiroop@gmail.com>
 */
include '../configuration.inc';

// Check for routes
if (preg_match('|'.BASE_URI.'(/([a-zA-Z0-9]+))?(/([a-zA-Z0-9]+))?|',$_SERVER['REQUEST_URI'],$matches)) {
	$resource = isset($matches[2]) ? $matches[2] : 'index';
	$action   = isset($matches[4]) ? $matches[4] : 'index';
}

if ($resource=='SMSinterface')
	$template = !empty($_REQUEST['format'])? new Template('SMS',$_REQUEST['format']) : new Template('SMS',ConfigurationList::get('SMSResponseFormat'));
else if (($resource=='simulator')&&($action=='getResponse'))
	$template = !empty($_REQUEST['format'])? new Template('simulator',$_REQUEST['format']) : new Template('simulator');
else if (($resource=='scheduledSMS')&&($action=='sendBurstSMS'))
	{
	$template = new Template('scheduledSimulator','xml') ;
	}
else
	$template = !empty($_REQUEST['format'])? new Template('default',$_REQUEST['format']) : new Template('default');
	
// Execute the Controller::action()
if (isset($resource) && isset($action) && $ZEND_ACL->has($resource)) {
	$USER_ROLE = isset($_SESSION['USER']) ? $_SESSION['USER']->getRole() : 'Anonymous';
	if ($ZEND_ACL->isAllowed($USER_ROLE, $resource, $action)) {
		$controller = ucfirst($resource).'Controller';		
		$c = new $controller($template);
		$c->$action();
	}
	else {
		header('HTTP/1.1 403 Forbidden', true, 403);
		$_SESSION['errorMessages'][] = new Exception('noAccessAllowed');
	}
}
else {
	header('HTTP/1.1 404 Not Found', true, 404);
	$template->blocks[] = new Block('404.inc');
}

echo $template->render();
