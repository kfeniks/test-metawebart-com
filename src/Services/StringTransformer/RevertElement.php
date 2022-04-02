<?php

declare(strict_types=1);

namespace App\Services\StringTransformer;

/**
 * Class RevertElementService
 * @version 1.0.0
 * @access public
 * @package App\Services\StringTransformer
 */
class RevertElement implements StringTransformInterface
{
    /**
     * @inheritDoc
     */
    public function transform(string $value)
    {
        switch($value) {
            case '(':
                $revertElement = ')';
                break;
            case '{':
                $revertElement = '}';
                break;
            case '[':
                $revertElement = ']';
                break;
            case ')':
                $revertElement = '(';
                break;
            case '}':
                $revertElement = '{';
                break;
            case ']':
                $revertElement = '[';
                break;
            default:
                $revertElement = false;
        }
    
        return $revertElement;
    }
}