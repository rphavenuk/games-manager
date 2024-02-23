<?php

declare(strict_types=1);

namespace App\Query\Exception;

use InvalidArgumentException;

final class ActiveBranchesCannotBeEmpty extends InvalidArgumentException implements QueryException
{
    public function __construct()
    {
        parent::__construct('You must pass at least one active branch');
    }
}
