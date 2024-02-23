<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party\Exception;

use InvalidArgumentException;
use RpHaven\Games\Game\Party\Participant;

final class DuplicateParticipant extends InvalidArgumentException implements PartyException
{
    public function __construct(
        public Participant $duplicate
    ) {
        parent::__construct(
            sprintf('Participant %s is in the party twice', $this->duplicate->toString()),
        );
    }
}
