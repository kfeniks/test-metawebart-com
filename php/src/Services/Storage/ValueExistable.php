<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Interface ValueExistable
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
interface ValueExistable
{
    /**
     * @param mixed $value
     * @return bool
     */
    public function hasValue($value): bool;
}