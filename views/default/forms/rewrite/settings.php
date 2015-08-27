<?php

echo "<div class=\"rewrite-table\">";

echo "<div class=\"rewrite-row rewrite-head\">";
    echo "<div class=\"rewrite-cell\">" . elgg_echo("rewrite:source") . "</div>";
    echo "<div class=\"rewrite-cell\">" . elgg_echo("rewrite:destination") . "</div>";
echo "</div>";

foreach ($vars['rewrites'] as $i => $rewrite) {
    echo "<div class=\"rewrite-row\">";

    echo "<div class=\"rewrite-cell\">";
    echo elgg_view('input/text', array(
        'name' => 'rewrites[' . $i . '][source]',
        'value' => $rewrite['source']
    ));
    echo "</div>";

    echo "<div class=\"rewrite-cell\">";
    echo elgg_view('input/text', array(
        'name' => 'rewrites[' . $i . '][destination]',
        'value' => $rewrite['destination']
    ));
    echo "</div>";

    echo "<div class=\"rewrite-cell\">";
    echo elgg_view('output/url', array(
        'text' => elgg_view('output/icon', array('class' => 'elgg-icon-delete')),
        'class' => 'rewrite-remove',
        'onClick' => 'elgg.rewrite.remove(this);'
    ));
    echo "</div>";

    echo "</div>";
}

echo "</div>";

echo '<div class="elgg-foot">';
    echo '<p>';
    echo elgg_view('input/button', array(
        'value' => elgg_echo('add'),
        'class' => 'rewrite-add'
    ));
    echo elgg_view('input/submit', array('value' => elgg_echo('save')));
    echo '</p>';
echo '</div>';
