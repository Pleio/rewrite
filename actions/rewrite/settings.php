<?php

$rewrites = get_input('rewrites');
$plugin = elgg_get_plugin_from_id('rewrite');

// remove rows with empty source or value
foreach ($rewrites as $i => $rewrite) {
    if ($rewrite['source'] == "" | $rewrite['destination'] == "") {
        unset($rewrites[$i]);
    }
}

// unset rewrites when no rewrite is defined
if (count($rewrites) == 0) {
    elgg_unset_plugin_setting('rewrites', 'rewrite');
} else {
    elgg_set_plugin_setting('rewrites', serialize($rewrites), 'rewrite');
}

system_message(elgg_echo('admin:configuration:success'));
forward(REFERER);