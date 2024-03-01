<?php

declare(strict_types=1);

namespace Api\Console;

use Symfony\Component\Console\Command\Command;

interface ActionConfigurator
{
    public function __invoke(Command $command): Command;
}
