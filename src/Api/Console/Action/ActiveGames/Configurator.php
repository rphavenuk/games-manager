<?php

declare(strict_types=1);

namespace Api\Console\Action\ActiveGames;

use Api\Console\ActionConfigurator;
use Symfony\Component\Console\Command\Command;

final readonly class Configurator implements ActionConfigurator
{

    public function __invoke(Command $command): Command
    {
        // TODO: Implement __invoke() method.
    }
}
