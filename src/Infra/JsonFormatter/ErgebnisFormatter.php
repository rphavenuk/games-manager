<?php

declare(strict_types=1);

namespace Infra\JsonFormatter;

use Ergebnis\Json\Json;
use Ergebnis\Json\Normalizer\Normalizer;
use Infra\JsonFormatter;

final readonly class ErgebnisFormatter implements JsonFormatter
{
    public const DEFAULT_INDENT = 2;

    private string $indent;

    public function __construct(private Normalizer $normalizer)
    {
    }

    public function format(mixed $data): string
    {
        $json = Json::fromString(json_encode($data));

        return $this->normalizer->normalize($json)->toString();
    }
}
