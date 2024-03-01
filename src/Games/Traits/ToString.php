<?php

declare(strict_types=1);

namespace RpHaven\Games\Traits;

trait ToString
{
    public function __toString(): string
    {
        return $this->toString();
    }

    abstract public function toString(): string;
}
