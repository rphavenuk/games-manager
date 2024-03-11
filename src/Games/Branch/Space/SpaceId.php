<?php

declare(strict_types=1);

namespace RpHaven\Games\Branch\Space;

use Nyholm\Psr7\Uri;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Traits\Oid;
use RpHaven\Games\Traits\ToString;
use RpHaven\Games\Traits\Uid;
use Symfony\Component\Uid\AbstractUid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV5;

final readonly class SpaceId implements ToStringable
{
    use ToString;
    use Oid;
    use Uid;

    public const OID_URI = 'https://rphaven.co.uk/space';

    public static function create(Space $space): self
    {
        return new self(
            Uuid::v5(self::namespace(), sprintf(
                '%s:%s',
                $space->name(),
                $space->type()->value,
            ))
        );
    }

    private function __construct(private UuidV5 $uid)
    {
    }

    private static function oid(): Uri
    {
        return new Uri(self::OID_URI);
    }

    private function uid(): AbstractUid
    {
        // TODO: Implement uid() method.
    }
}
