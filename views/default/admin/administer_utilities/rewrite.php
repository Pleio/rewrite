<?php

$rewrites = unserialize(elgg_get_plugin_setting('rewrites', 'rewrite'));

$examples = array(
    array(
        'source' => '/redirect-this-page',
        'target' => 'https://www.google.nl',
    ),
    array(
        'source' => '/redirect-this-page',
        'target' => '/another-local-page'
    ),
    array(
        'source' => '\/old_blogs\/([0-9]*)\/',
        'target' => '/blogs/all'
    ),
    array(
        'source' => '\/old_blogs\/(.*)\/',
        'target' => '/blogs/{0}/'
    )
);

echo '<p>' . nl2br(elgg_echo('rewrite:explanation')) . '</p>';

echo '<p>';
echo '<b>' . elgg_echo('rewrite:examples') . '</b><br />';
foreach ($examples as $example) {
    echo $example['source'] . ' ' . elgg_echo('rewrite:to') . ' ' . $example['target'] . '<br />';
}
echo '</p>';

echo elgg_view_form('rewrite/settings', array(), array('rewrites' => $rewrites));