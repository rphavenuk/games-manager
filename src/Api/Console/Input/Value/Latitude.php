<?php

declare(strict_types=1);

namespace Api\Console\Input\Value;

use Api\Console\Input;
use Ds\Map;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class Latitude implements Input
{
    private const KEY = Keys::LATITUDE;
    public function add(InputDefinition $definition): InputDefinition
    {
        $definition->addOption($this->create());

        return $definition;
    }

    public function extract(InputInterface $input, OutputInterface $output, Map $content = new Map()): Map
    {
        $content->put(self::KEY, $input->getOption(self::KEY->value));

        return $content;
    }

    public function create(): InputOption
    {
        return new InputOption(
            name: self::KEY->value,
            mode: InputOption::VALUE_REQUIRED,
            description: 'The longitude of the venue',
        );
    }
}
