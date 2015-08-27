<?php

function rewrite_get_path($path) {
    $rewrites = unserialize(elgg_get_plugin_setting('rewrites', 'rewrite'));

    if (!$rewrites) {
        return false;
    }

    foreach ($rewrites as $rewrite) {
        if ($path == $rewrite['source']) {
            forward($rewrite['destination']);
        } elseif (preg_match("/" . $rewrite['source'] . "/", $path, $source_groups)) {
            if (preg_match("/{[0-9]*}/", $rewrite['destination'], $destination_groups)) {

                $destination = $rewrite['destination'];

                foreach ($source_groups as $i => $group) {
                    $destination = str_replace("{" . ($i-1) . "}", $group, $destination);
                }

                forward($destination);
            } else {
                forward($rewrite['destination']);
            }
        }
    }

    return false;
}