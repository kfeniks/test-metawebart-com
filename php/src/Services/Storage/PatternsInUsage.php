<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Class PatternsInUsage
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
class PatternsInUsage extends BaseStore implements Storable, Addable
{
    /**
     * @param mixed$value
     */
    public function add($value): void
    {
        $this->offsetSet(null, $value);
    }
}