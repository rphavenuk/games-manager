<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter\Hal\Resource;

use Api\Http\ResponseFormatter\Hal\Resource;
use Ds\Map;
use Ds\Set;
use Generator;
use JsonSerializable;

final readonly class Embedded implements JsonSerializable
{
    public const KEY_EMBEDDED = '_embedded';

    public function __construct(private Map $embedded = new Map())
    {
    }

    public function jsonSerialize(): array
    {
        if ($this->embedded->isEmpty()) {
            return [];
        }

        return [
            self::KEY_EMBEDDED => $this->embedded(),
        ];
    }

    public function with(string $key, Resource ...$resources): self
    {
        $embedded = $this->embedded->copy();
        $resources = match (count($resources)) {
            1 => $resources[0] ,
            default => new Set($resources),
        };
        $embedded->put($key, $resources);

        return new self($embedded);
    }

    private function embedded(): array
    {
        $embedded = [];

        foreach ($this->extract($this->embedded) as $key => $resource) {
            $embedded[$key] = $resource;
        }

        return $embedded;
    }

    private function extract(iterable $resources): Generator
    {
        foreach ($resources as $key => $resource) {
            if (!($resource instanceof Resource)) {
                $resource = iterator_to_array($this->extract($resource));
            }
            yield $key => $resource;
        }
    }
}
