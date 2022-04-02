<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Class PatternStore
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
class PatternStore extends BaseStore implements Storable
{
    /**
     * @param string $patternStr
     */
    public function __construct(
        string $patternStr
    ) {
        $arrayPatterns = str_split($patternStr);
        foreach ($arrayPatterns as $pattern) {
            $this->offsetSet($pattern,$pattern);
        }
    }
}