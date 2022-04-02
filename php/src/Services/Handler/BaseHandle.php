<?php

declare(strict_types=1);

namespace App\Services\Handler;

/**
 * Class BaseHandle
 * @version 1.0.0
 * @access public
 * @package App\Services\Handler
 */
abstract class BaseHandle
{
    /**
     * @return bool|string
     */
    abstract public function handle(): bool|string;
}