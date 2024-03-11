<?php

declare(strict_types=1);

namespace RpHaven\Games\Traits;

use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;

trait Uid
{

    public static function fromBinary(string $bytes): self
    {
        return new self(Uuid::fromBinary($bytes));
    }

    public function toString(): string
    {
        return $this->uid()->toRfc4122();
    }

    public function toBinary(): string
    {
        return $this->uid()->toBinary();
    }
    abstract private function uid(): AbstractUid;
}
