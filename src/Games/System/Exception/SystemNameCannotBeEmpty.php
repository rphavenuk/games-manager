<?php

declare(strict_types=1);

namespace RpHaven\Games\System\Exception;

use InvalidArgumentException;

final class SystemNameCannotBeEmpty extends InvalidArgumentException implements SystemException
{
    public function __construct()
    {
        parent::__construct('The game system name cannot be empty');
    }
}