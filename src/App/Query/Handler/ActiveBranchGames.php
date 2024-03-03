<?php

declare(strict_types=1);

namespace App\Query\Handler;

use App\Query\QueryActiveBranchGames;
use App\Query\QueryHandler;
use App\Result\ActiveGames;
use RpHaven\Games\Repository\ActiveBranchCampaigns;

final readonly class ActiveBranchGames implements QueryHandler
{
    public function __construct(private ActiveBranchCampaigns $activeBranchCampaigns)
    {
    }
    public function __invoke(QueryActiveBranchGames $query): ActiveGames
    {
        $activeGames = ActiveGames::init();
        $result = $this->activeBranchCampaigns->fetchActiveCampaigns(
            $query->date,
            ... $query->branches(),
        );
        var_dump($result);

        foreach ($query->branches() as $branch) {
            $activeGames = $activeGames->with($branch);
        }

        return $activeGames;
    }
}
