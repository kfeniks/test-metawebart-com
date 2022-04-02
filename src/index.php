<?php
/**
 * @version 1.0.0
 * @access public
 */

declare(strict_types=1);

use App\Services\Handler\StringWithPatternHandle;
use \App\Services\StringFilter\StringFilterWithPattern;
use \App\Services\Storage\PatternStore;
use \App\Services\Validator\PatternValidator;

function someControllerCode(string $value, string $pattern)
{
    $filter = new StringFilterWithPattern($value);
    $availablePatterns = new PatternStore($pattern);
    $validator = new PatternValidator($availablePatterns);
    
    $handle = new StringWithPatternHandle($filter,$validator);
    $result = $handle->handle();
    
    if ($result) {
        echo 'Result is: ' . $result;
    } else echo 'Something went wrong...';
}

$strCorrect = 'String with ( nested (brackets) for () example [])';
$pattern = '[({})]';
someControllerCode($strCorrect, $pattern);