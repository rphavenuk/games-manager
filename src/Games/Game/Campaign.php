<?php

declare(strict_types=1);

namespace RpHaven\Games\Game;

use Countable;
use DateTimeImmutable;
use Ds\Map;
use Generator;

readonly class Campaign implements Countable
{

    public static function create(
        Session ... $sessions
    ): self {
        $sessionMap = new Map();
        foreach ($sessions as $session) {
            $sessionMap->put($session->start(), $session);
        }

        return new self($sessionMap);
    }
    private function __construct(private Map $sessions)
    {
        $this->sort();
    }

    public function add(Session ...$sessions): self
    {
        return self::create(...array_merge($this->sessions->toArray(), $sessions));
    }

    /**
     * @return Generator<DateTimeImmutable, Session>
     */
    public function sessions(): Generator
    {
        foreach ($this->sessions as $start => $session) {
            yield $start => $session;
        }
    }

    public function start(): Session
    {
        return $this->sessions->first()->value;
    }

    public function end(): Session
    {
        return $this->sessions->last()->value;
    }

    public function count(): int
    {
        return $this->sessions->count();
    }

    private function sort(): void
    {
        $this->sessions->ksort(static function (
            DateTimeImmutable $firstStart,
            DateTimeImmutable $secondStart,
        ): int {
            return (int) $firstStart->diff($secondStart)->format('%rs');
        });
    }
}
