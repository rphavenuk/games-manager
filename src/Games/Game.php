<?php

declare(strict_types=1);

namespace RpHaven\Games;

use RpHaven\Games\Game\Campaign;
use RpHaven\Games\Game\Party;
use RpHaven\Games\Game\Session;
use RpHaven\Games\Game\System;

final readonly class Game
{
    public function __construct(
        public Campaign $campaign,
        public System $system,
        public Party $party,
    ) {

    }

    public function firstSession(): Session
    {
        return $this->campaign->start();
    }

    public function lastSession(): Session
    {
        return $this->campaign->end();
    }
}
