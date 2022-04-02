<?php

declare(strict_types=1);

namespace App\Services\Handler;

use App\Helpers\String\InvalidCharacters;
use App\Services\Storage\PatternsInUsage;
use App\Services\StringFilter\CleanStringFilter;
use App\Services\StringTransformer\RevertElement;
use App\Services\Validator\PatternValidator;

/**
 * Class StringWithPatternHandle
 * @version 1.0.0
 * @access public
 * @package App\Services\Handler
 */
class StringWithPatternHandle extends BaseHandle
{
    /**
     * @var PatternsInUsage
     */
    private PatternsInUsage $stack;
    /**
     * @var RevertElement
     */
    private RevertElement $serviceTrans;
    
    /**
     * @param CleanStringFilter $filter
     * @param PatternValidator $validator
     */
    public function __construct(
        private CleanStringFilter $filter,
        private PatternValidator $validator,
        
    ) {
        $this->stack = new PatternsInUsage();
        $this->serviceTrans = new RevertElement();
    }
    
    /**
     * @return bool|string
     */
    public function handle(): bool|string
    {
        for ($i = 0, $all = strlen($this->filter->getValue()); $i < $all; $i++) {
            $element = $this->filter->getValue()[$i] ?? null;
            if ($element && $this->validator->validate($element)) {
                if ($this->stack->hasValue($element)) {
                    $key = $this->stack->searchValue($element);
                    $this->stack->offsetUnset($key);
                } else {
                    $revertCharacter = $this->serviceTrans->transform($element);
                    if(!$revertCharacter) {
                        continue;
                    }
                
                    if (in_array($element, InvalidCharacters::CLOSING_CHAR)) {
                        return 'Wrong';
                    }
    
                    $this->stack->add($revertCharacter);
                }
            }
        }
    
        return count($this->stack) === 0 ? 'Correct' : 'Wrong';
    }
}