<?php

declare(strict_types=1);

namespace App;

use App\Helpers\String\InvalidCharacters;
use App\Services\Storage\PatternsInUsage;
use App\Services\Storage\PatternStore;
use App\Services\StringFilter\StringFilterWithPattern;
use App\Services\StringTransformer\RevertElement;
use App\Services\Validator\PatternValidator;

/**
 * Class Add
 * @version 1.0.0
 * @access public
 * @package App
 */
class Add
{
    public function ed(string $value, string $pattern): string
    {
        $filter = new StringFilterWithPattern($value);
        $availablePatterns = new PatternStore($pattern);
        $validator = new PatternValidator($availablePatterns);
        
        $stack = new PatternsInUsage();
        
        $serviceTrans = new RevertElement();
    
        for ($i = 0, $all = strlen($filter->getValue()); $i < $all; $i++) {
            $element = $filter->getValue()[$i] ?? null;
            if ($element && $validator->validate($element)) {
                if ($stack->hasValue($element)) {
                    $key = $stack->searchValue($element);
                    $stack->offsetUnset($key);
                } else {
                    $revertCharacter = $serviceTrans->transform($element);
                    if(!$revertCharacter) {
                        continue;
                    }
                
                    if (in_array($element, InvalidCharacters::CLOSING_CHAR)) {
                        return 'Wrong';
                    }
    
                    $stack->add($revertCharacter);
                }
            }
        }
    
        return count($stack) === 0 ? 'Correct' : 'Wrong';
    }
}