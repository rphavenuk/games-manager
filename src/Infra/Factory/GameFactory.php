<?php

declare(strict_types=1);

namespace Infra\Factory;

use RpHaven\Games\Game;
use RpHaven\Games\Game\Campaign;
use RpHaven\Games\Game\Party;
use RpHaven\Games\Game\Party\Participant\GamesMaster;
use RpHaven\Games\Game\System;

final class GameFactory
{
    public function init(System|string $system, GamesMaster $gamesMaster, Campaign $campaign): Game
    {
        $system = ($system instanceof System) ? $system : new System($system);

        return new Game(
            campaign: $campaign,
            system: $system,
            party: Party::form($gamesMaster),
        );
    }
}
