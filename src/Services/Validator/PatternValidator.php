<?php

declare(strict_types=1);

namespace App\Services\Validator;

use App\Services\Storage\Storable;

/**
 * Class PatternValidator
 * @version 1.0.0
 * @access public
 * @package App\Services\Validator
 */
class PatternValidator
{
    /**
     * @param Storable $availablePatterns
     */
    public function __construct(
        private Storable $availablePatterns
    ) { }
    
    /**
     * @param string $pattern
     * @return bool
     */
    public function validate(string $pattern): bool
    {
        return $this->availablePatterns->offsetExists($pattern);
    }
}