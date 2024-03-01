<?php

declare(strict_types=1);

namespace Api\Console;

use Ds\Map;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

interface Input
{
    public function add(InputDefinition $definition): InputDefinition;

    public function create(): InputArgument | InputOption;

    public function extract(InputInterface $input, OutputInterface $output, Map $content = new Map()): Map;
}
