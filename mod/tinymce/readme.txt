Notes:

* An extended tinymce plugin based on version 3.4.9 of the TinyMCE editor.



Instructions:

1. Disable the Elgg core tinymce plugin,

2. Replace the tinymce folder in your mod directory with this tinymce folder,

3. Replace start.php of the htmlawed plugin with the start.php file in the htmlawed subfolder in this plugin. This version of htmlawed's start.php is a backport of Elgg 1.8 that works better for me - for example it also allowed different fonts to be used in postings.

4. Enable the tinymce plugin again,

5. Execute the upgrade.php script, i.e. call http://<yoursite.domain>/upgrade.php in your browser.
