<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party\Exception;

use Ds\Set;
use InvalidArgumentException;

final class PartyHasNoGamesMaster extends InvalidArgumentException implements PartyException
{
    public function  __construct(public readonly Set $party)
    {
        parent::__construct(sprintf('The party has %d participants, but no GM', $this->party->count()));
    }
}
