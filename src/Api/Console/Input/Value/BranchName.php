<?php

declare(strict_types=1);

namespace Api\Console\Input\Value;

use Api\Console\Input;
use Ds\Map;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class BranchName implements Input
{
    private const KEY = Keys::BRANCH_NAME;
    public function add(InputDefinition $definition): InputDefinition
    {
        $definition->addArgument($this->create());

        return $definition;
    }

    public function extract(InputInterface $input, OutputInterface $output, Map $content = new Map()): Map
    {
        $content->put(self::KEY, $input->getArgument(self::KEY->value));

        return $content;
    }

    public function create(): InputArgument
    {
        return new InputArgument(
            self::KEY->value,
            InputArgument::REQUIRED,
            'The human-readable name of the branch',
        );
    }
}
