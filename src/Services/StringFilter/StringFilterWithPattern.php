<?php

declare(strict_types=1);

namespace App\Services\StringFilter;

use App\Helpers\String\RegularCharacters;

/**
 * Class StringFilterPatternService
 * @version 1.0.0
 * @access public
 * @package App\Services\StringFilter
 */
class StringFilterWithPattern
{
    /**
     * @var string
     */
    private string $value;
    
    /**
     * @param string $string
     */
    public function __construct(
        string $string
    ) {
        $chars = RegularCharacters::REGULAR_CHAR;
        
        $this->value = preg_replace('/['.$chars.']/', '', $string) ?? '';
    }
    
    /**
     * @return string
     */
    public function getValue() : string
    {
        return $this->value;
    }
}