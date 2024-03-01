<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch;

use DateTimeImmutable;
use GuzzleHttp\Psr7\Uri;
use RpHaven\Games\Traits\ToString;
use RpHaven\Games\Traits\Uid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV5;

final readonly class BranchId
{
    use ToString;
    use Uid;

    public static function create(string $branch, DateTimeImmutable $created): self
    {
        $oid = new Uri('https://rphaven.co.uk/branch');
        $namespace = Uuid::fromString(Uuid::NAMESPACE_URL);
        $namespacedOid = Uuid::v5($namespace, (string) $oid);

        return new self(
            Uuid::v5($namespacedOid, sprintf('%s:%s', $branch, $created->format(DATE_ATOM)))
        );
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private function uid(): UuidV5
    {
        return $this->uid;
    }
}
