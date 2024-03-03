<?php

declare(strict_types=1);

namespace Api\Console\ActionConfigurator\Traits;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;

trait ConfigureCommandDefinition
{
    public function __invoke(Command $command): Command
    {
        $command->setDefinition($this->configure($command->getDefinition()));

        return $command;
    }

    abstract private function configure(InputDefinition $definition): InputDefinition;
}
