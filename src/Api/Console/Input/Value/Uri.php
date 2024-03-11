<?php

declare(strict_types=1);

namespace Api\Console\Input\Value;

use Api\Console\Input;
use Api\Console\Input\Keys;
use Ds\Map;
use Nyholm\Psr7\Uri as Psr7Uri;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

final class Uri implements Input
{
    private const KEY = Keys::URI;

    public function add(InputDefinition $definition): InputDefinition
    {
        $definition->addOption($this->create());

        return $definition;
    }

    public function extract(InputInterface $input, OutputInterface $output, Map $content = new Map()): Map
    {
        if ($uri = $input->getOption(self::KEY->value)) {
            $uri = new Psr7Uri($uri);
        }
        $content->put(self::KEY, $uri);

        return $content;
    }

    public function create(): InputOption
    {
        return new InputOption(
            name: self::KEY->value,
            mode: InputOption::VALUE_OPTIONAL,
            description: 'A URI associated with this resource',
        );
    }
}
