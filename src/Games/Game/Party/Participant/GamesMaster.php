<?php

declare(strict_types=1);

namespace RpHaven\Games\Game\Party\Participant;

use RpHaven\Games\Attendee\Member;
use RpHaven\Games\Game\Party\Participant;
use RpHaven\Games\Game\Party\Role;
use RpHaven\Games\Traits\ToString;

final readonly class GamesMaster implements Participant
{
    use ToString;

    public static function create(string $name, string ... $pronouns): self
    {
        return new self(Member::create($name, ...$pronouns));
    }

    public function __construct(public Member $member)
    {
    }

    public function toString(): string
    {
        return $this->member->toString();
    }

    public function roles(): iterable
    {
        yield Role::GAMES_MASTER;
    }

    public function hasRole(Role $role): bool
    {
        return Role::GAMES_MASTER === $role;
    }
}
