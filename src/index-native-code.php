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
    $chars = 'a-zA-Z\s+';
    $brackets = preg_replace('/['.$chars.']/', '', $value);
    $availablePatterns = str_split($pattern);
    $stack = [];
    
    for ($i = 0, $all = strlen($brackets); $i < $all; $i++) {
        $element = $brackets[$i];
        if (in_array($element, $availablePatterns) ) {
            if (in_array($element, $stack)) {
                $key = array_search($element, $stack);
                unset($stack[$key]);
            } else {
                $revertCharacter = revertCharacter($element);
                if(!$revertCharacter) {
                    continue;
                }
                
                if (in_array($element, closingSigns())) {
                    return 'Wrong';
                }
                
                array_unshift($stack, $revertCharacter);
            }
        }
    }
    
    return count($stack) === 0 ? 'Correct' : 'Wrong';
}

/**
 * @param string $value
 * @return false|string
 */
function revertCharacter(string $value)
{
    switch($value) {
        case '(':
            $revertElement = ')';
            break;
        case '{':
            $revertElement = '}';
            break;
        case '[':
            $revertElement = ']';
            break;
        case ')':
            $revertElement = '(';
            break;
        case '}':
            $revertElement = '{';
            break;
        case ']':
            $revertElement = '[';
            break;
        default:
            $revertElement = false;
    }
    
    return $revertElement;
}

/**
 * @return string[]
 */
function closingSigns(): array
{
    return [')', '}', ']'];
}

$strCorrect = 'String with ( nested (brackets) for () example [])';
echo 'Result is: ' . validate($strCorrect, '[({})]') . PHP_EOL;