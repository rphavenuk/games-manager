<?php

declare(strict_types=1);

namespace App\Command;

use App\Command;
use App\Result;

interface CommandBus
{
    public function handle(Command $command): Result|null;
}