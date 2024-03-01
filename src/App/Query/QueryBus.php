<?php

declare(strict_types=1);

namespace App\Query;

use App\Query;
use App\Result;

interface QueryBus
{
    public function handle(Query $query): Result;
}