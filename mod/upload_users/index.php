<?php
/**
 * Upload users. Upload users page, called from /pg/upload_users
 *
 * @package upload_users
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Jaakko Naakka / Mediamaisteri Group
 * @copyright Mediamaisteri Group 2009
 * @link http://www.mediamaisteri.com/
 */

require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

global $CONFIG;
/// Get the upload users class
require_once($CONFIG->pluginspath . "/upload_users/lib/class.UploadUsers.php");

/// Only admins allowed here
admin_gatekeeper();

/// Set context so that the admin menu will be displayed 
set_context('admin');

/// Set admin user for the menu block
set_page_owner($_SESSION['guid']);

$upload = new UploadUsers();

/// Get the upload form
$body = $upload->getUploadForm();

$title = elgg_view_title(elgg_echo('upload_users:upload_users'));

/// Draw the page
page_draw(elgg_echo('upload_users:upload_users'), elgg_view_layout("two_column_left_sidebar", '', $title . $body));

?>

