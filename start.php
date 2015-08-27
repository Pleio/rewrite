<?php
/**
 * Elgg rewrite plugin
 *
 */

require_once(dirname(__FILE__) . "/lib/functions.php");
require_once(dirname(__FILE__) . "/lib/hooks.php");

elgg_register_event_handler('init','system','rewrite_init');

function rewrite_init() {
    elgg_extend_view('js/admin', 'rewrite/js/admin');
    elgg_extend_view('css/admin', 'rewrite/css/admin');

    elgg_register_plugin_hook_handler('forward', '404', 'rewrite_404_hook', 499);

    elgg_register_event_handler('pagesetup', 'system', 'rewrite_pagesetup');

    elgg_register_action('rewrite/settings', dirname(__FILE__) . '/actions/rewrite/settings.php', 'admin');
}


function rewrite_pagesetup() {
    elgg_register_admin_menu_item('administer', 'rewrite', 'administer_utilities');
}