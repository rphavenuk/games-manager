<?php

declare(strict_types=1);

namespace Api\Console\MessageFactory\Traits;

use Api\Console\Input;
use Ds\Map;
use Ds\Set;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

trait ExtractValuesTrait
{

    private function extractValues(InputInterface $input, OutputInterface $output): Map
    {
        $content = new Map();
        /** @var Input $input */
        foreach ($this->inputs() as $inputValue) {
            $content = $inputValue->extract($input, $output, $content);
        }

        return $content;
    }

    abstract private function inputs(): Set;
}
