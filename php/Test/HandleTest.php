<?php

declare(strict_types=1);

namespace App\Test;

use App\Services\Handler\StringWithPatternHandle;
use App\Services\Storage\PatternStore;
use App\Services\StringFilter\CleanStringFilter;
use App\Services\Validator\PatternValidator;
use PHPUnit\Framework\TestCase;

/**
 * Class HandleTest
 * @version 1.0.0
 * @access public
 * @package App\Test
 */
class HandleTest extends TestCase
{
    public function testHasMethodHandle()
    {
        $handle = $this->createMock(StringWithPatternHandle::class);
        $this->assertSame(FALSE, $handle->handle());
    }
    
    public function testCorrectHandleString()
    {
        $pattern = '[({})]';
        $availablePatterns = new PatternStore($pattern);
        $validator = new PatternValidator($availablePatterns);
        
        $strCorrect = 'String with ( nested (brackets) for () example [])';
        $strWrong = 'String with (( nested (brackets) for () example {[])';
    
        $filter = new CleanStringFilter($strCorrect);
        $handle = new StringWithPatternHandle($filter,$validator);
    
        $filterWrong = new CleanStringFilter($strWrong);
        $handleWrong = new StringWithPatternHandle($filterWrong,$validator);
        
        $this->assertSame('Correct', $handle->handle());
        $this->assertSame('Wrong', $handleWrong->handle());
    }
}