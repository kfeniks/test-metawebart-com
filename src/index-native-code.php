<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

function validate(string $value): string
{
    return 'Wrong';
}

$str = '';
echo 'Result is: ' . validate($str) . PHP_EOL;