/**
 * Elgg Request modifications module.
 * Adds extensible requests notifications views.
 *
 * @package requestnotifications
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Adolfo Mazorra
 * @copyright Adolfo Mazorra 2009
 * @version 0.1
 */
 
DESCRIPTION:

This plugin adds a riverdashboard sidebox and a dashboard widget showing a list
of notifications for all of the user's received pending requests. There is
also a full view showing the notifications detail from which the user can
decide whether to reject or accept each request.

It provides a centralized place to put the request notifications, and the
listings can be extended by third modules using plugin hooks. More information
about this in the readme.txt file.

INTEGRATED MODULES:

The ideal would be that other plugins created their own notifications requests
using the plugin hooks commented above, but at this moment the following
modules have been integrated inside the base requestnotifications (they are
not required anyway for this plugin to work):

- groups : Notifications for closed group requests and invitations.
- friend_request : Notifications for friendship requests.
- bookmarks : Notifications for shared bookmarks.

The module can be also integrated as a sidebox to the riverdashboard (either
the default one or most modified versions). Instructions to do so are included in
the readme.txt file.

EXTRA:

The plugin also adds new actions for removing group invitations and shared
bookmarks, as the original plugins didn't have that. I still haven't decided
what the "accept" action for shared bookmarks should be.

INSTALLATION:

Just extract to the 'mod' folder and enable the plugin via admin tools.

HOW TO EXTEND THE NOTIFICATION VIEWS FROM OTHER PLUGINS:

To add new notifications you have to register to this plugin hooks:
 - requestnotifications_list_add : For expanding the notifications shortlist.
 - requestnotifications_detail_add : For expanding the notifications detailed list.

This can be done like this:
	 register_plugin_hook("hook_name", 'all', your_function_name);

The function should be like this:
	 function your_function_name($hook, $type, $returnvalue, $params) { ... }

In the params a variable 'count' is passed, that containes the notification count
so far. If your plugin adds new modifications please increase this var (it is
used right now just for displaying the "No requests" message or not).

Your hook should write html code for the new notifications. Please check the
detailed.php and shortlist.php views in this plugin to get an idea of how the
current notifications are displayed.

HOW TO INTEGRATE WITH THE RIVERDASHBOARD:

Unfortunately the current default riverdashboard doesn't include any views we
can simply extend to add content to it, and most modified riverdashboards follow that
design, so in order to add the notifications sidebox we have to directly modify
their code.

For the default riverdashboard add the following line to the index.php file,
around line 37 (you should see very similar lines around, put this bellow them):

	 //set a view to display the requests notifications
	 $area1 .= elgg_view("requestnotifications/sidebox");	

For most riverdashboard modifications it should be similar.

TODO:

- Improve the request listing icons? (comments welcomed).
- Add new notifications / convince other plugin developers to integrate with this
	one and write their own request notifications.

CHANGELIST:
v0.1
	 Initial release
