<?php

declare(strict_types=1);

namespace Api\Console\Action\ListBranches;

use Api\Console\Action\InputTags;
use Api\Console\ActionConfigurator;
use Api\Console\Input;
use Ds\Set;
use Generator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class Configurator implements ActionConfigurator
{
    private Set $inputs;
    public function __construct(
        #[TaggedIterator(InputTags::LIST_BRANCHES->value)]
        iterable $inputs
    ) {
        $this->inputs = new Set($inputs);
    }
    public function __invoke(Command $command): Command
    {
        $command->setDefinition($this->configure($command->getDefinition()));

        return $command;
    }

    private function configure(InputDefinition $definition): InputDefinition
    {
        $definition->setDefinition(array_merge(
            $definition->getArguments(),
            $definition->getOptions(),
            iterator_to_array($this->getInputs()),
        ));

        return $definition;
    }

    private function getInputs(): Generator
    {
        /** @var Input $input */
        foreach ($this->inputs as $input) {
            $definition = $input->create();
            yield $definition->getName() => $definition;
        }
    }
}
