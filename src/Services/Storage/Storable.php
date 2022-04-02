<?php

declare(strict_types=1);

namespace App\Services\Storage;

/**
 * Interface Storable
 * @version 1.0.0
 * @access public
 * @package App\Services\Storage
 */
interface Storable extends \ArrayAccess, \Countable, \Iterator, \Serializable, ValueExistable, ValueSearchable
{
}