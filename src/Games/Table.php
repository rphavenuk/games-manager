<?php

declare(strict_types=1);

namespace RpHaven\Games;

use Countable;
use Ds\Map;
use Ds\Set;
use Generator;
use RpHaven\Games\Branch\Space;
use RpHaven\Games\Game\Session;
use RpHaven\Games\Interface\ToStringable;
use RpHaven\Games\Meet\Duration;
use RpHaven\Games\Traits\ToString;

final readonly class Table implements Countable, ToStringable
{
    use ToString;

    private Set $games;

    public static function set(string $name, Duration $lifetime, Space $space): self
    {
        return new self(
            name: $name,
            lifetime: $lifetime,
            space: $space
        );
    }
    private function __construct(
        public string $name,
        public Duration $lifetime,
        public Space $space,
        Game ...$games
    ) {
        $this->games = new Set($games);
        $this->assertValidGames();
    }

    public function toString(): string
    {
        return $this->name;
    }

    public function add(Game ...$games): self
    {

        return new self(
            $this->name,
            $this->lifetime,
            $this->space,
            ...$games
        );
    }

    public function games(): Generator
    {
        /** @var Game $game */
        foreach ($this->games as $game) {
            yield $game->firstSession() => $game;
        }
    }

    public function count(): int
    {
        return $this->games->count();
    }

    private function sort(): void
    {
        $this->games->ksort(static function (Session $gameOneFirsSession, Session $gameTwoFirsSession): int {
            return $gameOneFirsSession->compare($gameTwoFirsSession);
        });
    }

    private function assertValidGames(): void
    {
        $gameSessions = new Map();
        foreach ($this->games as $game) {
            foreach ($game->campaign->sessions() as $session) {
                $gameSessions->put();
            }
        }
    }
}
