<?php

declare(strict_types=1);

namespace RpHaven\Games\Traits;

use Symfony\Component\Uid\AbstractUid;

trait Uid
{

    public function toString(): string
    {
        return $this->uid()->toRfc4122();
    }

    public function toBytes(): string
    {
        return $this->uid()->toBinary();
    }
    abstract private function uid(): AbstractUid;
}
