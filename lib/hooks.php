<?php

/**
 * @param string $hook    The name of the plugin hook
 * @param string $type    The type of the plugin hook
 * @param mixed  $value   The current value of the plugin hook
 * @param mixed  $params  Data passed from the trigger
 *
 * @return mixed if not null, this will be the new value of the plugin hook
 */
function rewrite_404_hook($hook, $type, $value, $params) {
    $current = parse_url($params['current_url']);

    $path = rewrite_get_path($current['path']);

    if ($path) {
        forward($path);
    } else {
        return false;
    }
}