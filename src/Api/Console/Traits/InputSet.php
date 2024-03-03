<?php

declare(strict_types=1);

namespace Api\Console\Traits;

use Ds\Set;

trait InputSet
{
    private readonly Set $inputs;

    private function setInputs(iterable $inputs): void
    {
        $this->inputs = new Set($inputs);
    }

    private function inputs(): Set
    {
        return $this->inputs;
    }
}
