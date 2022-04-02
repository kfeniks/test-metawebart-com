<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\Handler\StringWithPatternHandle;
use App\Services\StringFilter\CleanStringFilter;
use App\Services\Storage\PatternStore;
use App\Services\Validator\PatternValidator;

/**
 * @param string $value
 * @param string $pattern
 */
function someControllerCode(string $value, string $pattern)
{
    $filter = new CleanStringFilter($value);
    $availablePatterns = new PatternStore($pattern);
    $validator = new PatternValidator($availablePatterns);
    
    $handle = new StringWithPatternHandle($filter,$validator);
    $result = $handle->handle();
    
    if ($result) {
        echo 'Result is: ' . $result . PHP_EOL;
    } else echo 'Something went wrong...' . PHP_EOL;
}

$strCorrect = 'String with ( nested (brackets) for () example [])';
$pattern = '[({})]';
someControllerCode($strCorrect, $pattern);