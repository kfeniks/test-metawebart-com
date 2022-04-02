<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Interface Addable
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
interface Addable
{
    /**
     * @param mixed$value
     */
    public function add($value): void;
}