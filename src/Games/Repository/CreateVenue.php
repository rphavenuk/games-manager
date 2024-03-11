<?php

declare(strict_types=1);

namespace RpHaven\Games\Repository;

use RpHaven\Games\Branch\Space\Details\Venue;
use RpHaven\Games\Branch\Space\SpaceId;

interface CreateVenue
{
    public function save(Venue $venue): SpaceId;
}
