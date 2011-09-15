/**

    README.php, part of Friend_invitation
    Copyright (C) 2009, Lorinthe, BV and Web100 Net technology Center,Ltd
    Author: Bogdan Nikovskiy, bogdan@web100.com.ua
	    
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
			    
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
					    
    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.

    Elgg version: 1.5
    Title: Friend_Invitation
    Intro: Preconfigured/editable invitation email
    Description: Sends invitation email, text can be edited by sender, default text is configured in Admin part. Very similar to "Invite_Friends" standard Elgg 1.5 plugin. 
    Have minor differences (like admin-configured invitation text).
    Plugin is developed by Web100 Net Technology Center, Ltd. http://web100.com.ua under the assignment of Lorinthe,BV.
    Dependencies: No
    Version: 1.3
    Licence: GPL v.3

						    	
 */

The Elgg 1.x friend_invitation plugin allows to send invitation to social network for not registered friend using its' emails.


*Activating the newest_members plugin*

Simply extract the newest_members plugin into the mod directory and
activate it as usual using the Elgg 1.x tool administration.

This creates a "friend_invitation" widget item in widgets list and menu item in administration area.

*Plugin settings*
Administrator user can use menu to open plugin setup page.
This page allow setup default message subject and default message text.
In subject and message adminstrator can put %MEMBER% macro and in message it will be replaced for actual
member name (name of member who sending invitation message).

