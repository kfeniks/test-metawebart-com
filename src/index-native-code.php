<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

/**
 * @param string $value
 * @param string $pattern
 * @return string
 */
function validate(string $value, string $pattern): string
{
    $brackets = preg_replace("~[^$pattern]~", '', $value);
    $pattern = substr($pattern, 0, 1);
    $stack = [];
    
    for ($i = 0, $all = strlen($brackets); $i < $all; $i++) {
        $element = $brackets[$i];
        if ($element == $pattern) {
            array_unshift($stack, $element);
        } elseif (!empty($stack)) {
            array_shift($stack);
        }
    }
    
    return count($stack) === 0 ? 'Correct' : 'Wrong';
}

$str = 'Строка с ( вложенными (скобками) для () примера)';
echo 'Result is: ' . validate($str, '()') . PHP_EOL;