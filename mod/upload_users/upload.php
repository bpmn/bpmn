<?php
/**
 * Upload users. Processes the uploaded file and prints a report of the cerated files.
 *
 * @package upload_users
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jaakko Naakka / Mediamaisteri Group
 * @copyright Mediamaisteri Group 2009
 * @link http://www.mediamaisteri.com/
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

/// Only admins allowed here
admin_gatekeeper();

global $CONFIG;
/// Get the uploadusers class
require_once($CONFIG->pluginspath . "/upload_users/lib/class.UploadUsers.php");


$upload = new UploadUsers();

/// Set context so that the admin menu will be displayed
set_context('admin');

/// Set admin user for the admin block
set_page_owner($_SESSION['guid']);

/// Get the input from the form or hidden fields
$encoding  = get_input('encoding');
$delimiter = get_input('delimiter');
$email     = get_input('email');
$confirm   = get_input('confirm', false);

/// Set the parameters
$upload->setEncoding($encoding);
$upload->setDelimiter($delimiter);
$upload->setEmail($email);

if(! $confirm){
	/// Open the file
	if(! $upload->openFile('csvfile')){
		forward($CONFIG->wwwroot . "pg/upload_users/");
	}

	/// Process the file
	if(! $upload->processFile()){
		forward($CONFIG->wwwroot . "pg/upload_users/");
	}
	
	/// Check the users
	$upload->checkUsers();
	/// Print the processed users for confirmation
	$body = $upload->getConfirmationReport();	
	$title = elgg_view_title(elgg_echo('upload_users:process_report'));
	
/// Create the users and print the report
}else{
	/// Create the users
	$upload->createUsers($_POST);
	/// Everything was fine -> Display the creation report
	$body = $upload->getCreationReport();	
	$title = elgg_view_title(elgg_echo('upload_users:creation_report'));
}

/// Draw the actual page
page_draw(elgg_echo('upload_users:upload_users'), elgg_view_layout("two_column_left_sidebar", '', $title . $body));

?>

