<?php

declare(strict_types=1);

namespace Api\Console\Input;

use Api\Console\Input;
use Ds\Map;
use Ds\Set;
use Generator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class InputSet
{
    private Set $inputs;
    public function __construct(Input ...$inputs)
    {
        $this->inputs = new Set($inputs);
    }

    public function definitions(): Generator
    {
        /** @var Input $input */
        foreach ($this->inputs as $input) {
            $definition = $input->create();
            yield $definition->getName() => $definition;
        }
    }

    public function extract(InputInterface $input, OutputInterface $output, Map $values = new Map()): Map
    {
        /** @var Input $input */
        foreach ($this->inputs as $inputValue) {
            $values = $inputValue->extract($input, $output, $values);
        }

        return $values;
    }
}
