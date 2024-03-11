<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal;

use Doctrine\DBAL\Connection;
use Infra\Repository\Dbal;
use RpHaven\Games\Branch\Space\Details\Venue;
use RpHaven\Games\Branch\Space\SpaceId;
use RpHaven\Games\Repository\CreateVenue as CreateVenueRepository;

final readonly class CreateVenue implements CreateVenueRepository, Dbal, Persists
{
    public function __construct(
        private Connection $connection,
        private CreateSpace $createSpace,
    ) {
    }
    public function save(Venue $venue): SpaceId
    {
        $spaceId = $this->createSpace->save($venue);

        $this->connection->createQueryBuilder()
            ->insert(Tables::VENUES->value)
            ->setValue('space', $spaceId)
            ->setValue('latitude', $venue->coordinates->latitude)
            ->setValue('longitude', $venue->coordinates->longitude)
            ->executeQuery();

        return $spaceId;
    }
}
