likes v0.3
Copyright (c) 2010 Keetup Development

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307  
USA

This program automatically will add information just once to the keetup.com servers. This information is sent when the plugin is activated. 
The information will be useful for us to know which elgg version does the user has installed and then we can know the majority and we can focus on that particular version. 
If you are not agree with this practice please feel free to comment line 11 of the file 
/mod/likes/views/default/settings/likes/edit.php
You should that line like this 
//run_function_once("likes_ping_home");


** ABOUT **
This module allows to marc the objects as "I like it" as facebook style ;) 
 
likes is released under the GNU Public License (GPL), which
is supplied in this distribution as LICENSE.


** CONTRIBUTORS **

See CONTRIBUTORS.txt for the development credits.


** LICENSE INFORMATION **

This software is governed under rights, privileges, and restrictions in 
addition to those provided by the GPL v2.  Please carefully read the
LICENSE.txt file for more information.


** INSTALLATION **

	* Unzip the file into the elgg/mods/ directory.

	* Go to your Elgg tools administration section, find the new tool, and 
	  enable it.
	  
	* Enjoy!
	  
	 
** TODO **

	  Milestone: Likes v0.4 (05/28/10)
	  	* Add comments support (like facebook).
	  	* Add notifications for comment feature.
	  	
	  Milestone: Likes v0.5 (06/02/10)
	  	* Make an statistics page (view) to know what are the elements that people likes more (Trajan's idea)

	  Milestone: Likes v0.6 (06/02/10)
	    * do better the logical of the plugin (citella's idea)	 	
	
	
	
	
** CHANGES **

	v0.3
	* Make the actions to be executed with AJAX.
	* Show all the users that took a vote.
	* Show with a lightbox all the users that liked an object.

	v0.2
	* Added the option that automaticaly adds all the functionalities to the rivers.
	* Added the functionality dislike, this has been rewritten (thanks bman!)
	* Allows that all the elements can be effected with a "like" action, comments, creations or updates.
	
	v0.1
	* Initial release. 

	