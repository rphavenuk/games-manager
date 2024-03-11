<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter\Hal\Resource;

use Ds\Map;
use Enum;

final readonly class State implements \JsonSerializable
{
    /**
     * @param Map<Enum, mixed> $state
     */
    public function __construct(private Map $state = new Map())
    {
    }

    public function jsonSerialize(): array
    {
        $state = [];

        foreach ($this->state as $key => $val) {
            $state[$key->value] = $val;
        }

        return $state;
    }

    public function add(Enum $key, mixed $value): self
    {
        $state = $this->state->copy();
        $state->put($key, $value);

        return new self($state);
    }
}
