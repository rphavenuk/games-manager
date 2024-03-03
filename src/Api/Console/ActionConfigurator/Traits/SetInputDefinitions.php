<?php

declare(strict_types=1);

namespace Api\Console\ActionConfigurator\Traits;

use Api\Console\Input;
use Ds\Set;
use Generator;
use Symfony\Component\Console\Input\InputDefinition;

trait SetInputDefinitions
{
    private function configure(InputDefinition $definition): InputDefinition
    {
        $definition->setDefinition(array_merge(
            $definition->getArguments(),
            $definition->getOptions(),
            iterator_to_array($this->inputFactory()),
        ));

        return $definition;
    }

    private function inputFactory(): Generator
    {
        /** @var Input $input */
        foreach ($this->inputs() as $input) {
            $definition = $input->create();
            yield $definition->getName() => $definition;
        }
    }

    abstract private function inputs(): Set;
}
