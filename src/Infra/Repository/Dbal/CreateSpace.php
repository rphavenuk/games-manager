<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal;

use Doctrine\DBAL\Connection;
use Infra\Repository\Dbal;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Branch\Space\SpaceId;

final readonly class CreateSpace implements Dbal, Persists
{
    public function __construct(private Connection $connection)
    {

    }

    public function save(Space $space): SpaceId
    {
        $spaceId = $space->toId();
        $this->connection->createQueryBuilder()
            ->insert(Tables::SPACES->value)
            ->setValue('id', $spaceId)
            ->setValue('name', $space->name())
            ->setValue('type', $space->type()->value)
            ->setValue('status', 'open');

        return $spaceId;
    }
}
