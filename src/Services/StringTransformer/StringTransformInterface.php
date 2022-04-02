<?php

declare(strict_types=1);

namespace App\Services\StringTransformer;

/**
 * Interface StringTransformInterface
 * @version 1.0.0
 * @access public
 * @package App\Services\StringTransformer
 */
interface StringTransformInterface
{
    /**
     * @param string $value
     * @return string|false
     */
    public function transform(string $value);
}