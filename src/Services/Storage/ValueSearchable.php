<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Interface ValueSearchable
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
interface ValueSearchable
{
    /**
     * @param mixed $value
     * @return int|string|false
     */
    public function searchValue($value): int|string|false;
}