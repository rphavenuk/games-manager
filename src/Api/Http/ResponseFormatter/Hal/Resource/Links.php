<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter\Hal\Resource;

use Ds\Map;
use Ds\Set;
use Generator;
use JsonSerializable;
use Psr\Http\Message\UriInterface;
use Stringable;

final readonly class Links implements JsonSerializable
{
    public static function init(iterable $links): self
    {
        $self = new self();
        foreach ($links as $rel => $hrefs) {
            $self->add($self->links, $rel, $hrefs);
        }

        return $self;
    }

    /**
     * @param Map<Stringable|string, Set> $links
     */
    private function __construct(private Map $links = new Map())
    {
    }

    public function __invoke(): Generator
    {
        /**
         * @var string|Stringable $rel
         * @var  UriInterface $href
         */
        foreach ($this->links as $rel => $href) {
            yield (string) $rel => (string) $href;
        }
    }

    public function with(string|Stringable $rel, UriInterface ...$hrefs): self
    {
        $links = $this->links->copy();
        $this->add($links, $rel, ... $hrefs);

        return new self($links);
    }

    public function jsonSerialize(): array
    {
        return [
            '_links' => iterator_to_array($this()),
        ];
    }

    private function add(Map $links, string|Stringable $rel, UriInterface ...$hrefs): void
    {
        $rel = (string) $rel;
        if (!$links->hasKey($rel)) {
            $links->put($rel, new Set());
        }

        $links->get($rel)->add($hrefs);
    }
}
