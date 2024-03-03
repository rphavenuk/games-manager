<?php

declare(strict_types=1);

namespace RpHaven\Games\Repository;

use DateTimeInterface;
use Generator;
use RpHaven\Games\Branch\Tables;
use RpHaven\Games\Game\Campaign;

interface ActiveBranchCampaigns
{
    /**
     * @param DateTimeInterface $dateTime
     * @param string ...$branches
     * @return Generator<Campaign>
     */
    public function fetchActiveCampaigns(DateTimeInterface $dateTime, string ...$branches): Generator;
}
