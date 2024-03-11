<?php

declare(strict_types=1);

namespace RpHaven\Games\Table;

use Nyholm\Psr7\Uri;
use RpHaven\Games\Table;
use RpHaven\Games\Traits\Oid;
use RpHaven\Games\Traits\ToString;
use RpHaven\Games\Traits\Uid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV5;

final readonly class TableId
{
    use ToString;
    use Oid;
    use Uid;

    public const OID = 'https://rphaven.co.uk/table';

    public static function create(Table $table): self
    {
        return new self(
            Uuid::v5(self::namespace(), sprintf(
                '%s:%s:%s:%s',
                $table->space->toId(),
                $table->name,
                $table->lifetime->start()->format(DATE_ATOM),
                $table->lifetime->end()->format(DATE_ATOM),
            ))
        );
    }

    private static function oid(): Uri
    {
        return new Uri(self::OID);
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private function uid(): UuidV5
    {
        return $this->uid;
    }
}
