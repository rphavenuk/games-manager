<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party\Participant;

use DateTimeImmutable;
use RpHaven\Games\Attendee;
use RpHaven\Games\Game\Party\Participant;
use RpHaven\Games\Game\Party\Role;
use RpHaven\Games\Traits\ToString;

final readonly class Player implements Participant
{
    use ToString;
    public function __construct(
        public Attendee $attendee,
        public DateTimeImmutable $joined = new DateTimeImmutable(),
    ) {}

    public function toString(): string
    {
        return $this->attendee->toString();
    }

    public function roles(): iterable
    {
        yield Role::PLAYER;
    }

    public function hasRole(Role $role): bool
    {
        return Role::PLAYER === $role;
    }
}
