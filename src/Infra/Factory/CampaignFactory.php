<?php

declare(strict_types=1);

namespace Infra\Factory;

use Generator;
use RpHaven\Games\Game\Campaign;
use RpHaven\Games\Game\Session;
use RpHaven\Games\Meet;

final class CampaignFactory
{
    public function meets(Meet ... $meets): Campaign
    {
        return Campaign::create(...$this->createMeetSessions(... $meets));
    }

    private function createMeetSessions(Meet ...$meets): Generator
    {
        foreach ($meets as $meet) {
            yield new Session($meet);
        }
    }
}
