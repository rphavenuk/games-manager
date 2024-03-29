<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal;

use DateTimeInterface;
use Generator;
use Infra\Repository\Dbal;
use Infra\Repository\Dbal\BranchGames\AsyncFactory;
use RpHaven\Games\Branch\Tables;
use RpHaven\Games\Repository\ActiveBranchCampaigns;

use function Amp\Future;

final readonly class BranchGames implements ActiveBranchCampaigns, Dbal
{

    public function __construct(private AsyncFactory $asyncFactory)
    {
    }
    public function fetchActiveCampaigns(
        DateTimeInterface $dateTime = new \DateTimeImmutable(),
        string ...$branches,
    ): Generator {
        foreach ($this->asyncFactory->futures($dateTime, ...$branches) as $branch => $campaign) {
            yield $branch => $campaign;
        }
    }
}
