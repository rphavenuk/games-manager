<?php

declare(strict_types=1);

namespace RpHaven\Games\Game;

use Countable;
use Ds\Set;
use Generator;
use RpHaven\Games\Game\Party\Exception\DuplicateParticipant;
use RpHaven\Games\Game\Party\Exception\PartyHasNoGamesMaster;
use RpHaven\Games\Game\Party\Participant;
use RpHaven\Games\Game\Party\Role;

final readonly class Party implements Countable
{

    public static function form(Participant ... $participants): self
    {
        return new self(self::formPartyFromParticipants($participants));
    }

    private static function formPartyFromParticipants(iterable $participants): Set
    {
        $party = new Set();

        foreach ($participants as $participant) {
            if ($party->contains($participant)) {
                throw new DuplicateParticipant($participant);
            }
            $party->add($participant);
        }

        return $party;
    }

    private function __construct(
        private Set $participants
    ) {
        $this->assertValidParty();
    }

    public function players(): Generator
    {
        yield from $this->participants->filter(static function (Participant $participant): bool {
            return $participant->hasRole(Role::PLAYER);
        });
    }

    public function gamesMasters(): Generator
    {
        yield from $this->participants->filter(static function (Participant $participant): bool {
            return $participant->hasRole(Role::GAMES_MASTER);
        });
    }

    public function count(): int
    {
        return $this->participants->count();
    }

    public function add(Participant $participant): self
    {
        $particpants = $this->participants->copy();
        $particpants->add($participant);

        return new self($particpants);
    }

    private function assertValidParty(): void
    {
        foreach ($this->participants as $participant) {
            if ($participant->hasRole(Role::GAMES_MASTER)) {
                return;
            }
        }

        throw new PartyHasNoGamesMaster($this->participants);
    }
}
