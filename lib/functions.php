<?php

use Automad\Core\Automad;

func('icon', function (array $options, Automad $Automad): string {
	$icon = file_get_contents(__DIR__ . '/../icons/' . $options['name'] . '.svg');

	return $icon;
});
