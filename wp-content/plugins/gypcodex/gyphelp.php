<?php
/*
Plugin Name: Gather Your Party Contributor Codex
Description: Adds a site help link to the admin menu
Author: Rob Welch (forked from an addon by Addison Berry)
*/
// mt_add_pages() is the sink function for the 'admin_menu' hook
function mt_add_pages() {
    // Add a new top-level menu:
   // The first parameter is the Page name(Site Help), second is the Menu name(Help)
   //and the number(5) is the user level that gets access
    add_menu_page('Site Help', 'Help', 0, __FILE__, 'mt_toplevel_page');
}
// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function mt_toplevel_page() {

include 'helpcontent.php';

}
// Insert the mt_add_pages() sink into the plugin hook list for 'admin_menu'
add_action('admin_menu', 'mt_add_pages');
?>