<?php

use Automad\Core\Automad;

/**
 * This is a simple example how to define little helper function with plain PHP
 * that can be easily used inside templates.
 *
 * The "icon" function can be used in templates like "<@ icon { name: '...' } @>".
 */
func('icon', function (array $options, Automad $Automad): string {
	$icon = file_get_contents(__DIR__ . '/../icons/' . $options['name'] . '.svg');

	return $icon;
});
