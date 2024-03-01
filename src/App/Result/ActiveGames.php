<?php

declare(strict_types=1);

namespace App\Result;

use App\Result;
use Ds\Map;
use Ds\Set;
use Generator;
use RpHaven\Games\Branch\Tables;
use RpHaven\Games\Game;

final readonly class ActiveGames implements Result
{
    public static function init(): self
    {
        return new self();
    }

    private function __construct(private readonly Map $activeGames = new Map())
    {
    }

    public function __invoke(): Generator
    {
        /**
         * @var Tables $branch
         * @var Set $games
         */
        foreach ($this->activeGames as $branch => $games) {
            /** @var Game $game */
            foreach ($games as $game) {
                yield $branch => $game;
            }
        }
    }

    public function with(Tables $branch, Game ...$games): self
    {
        $branchGames = $this->activeGames->copy();
        if (!$branchGames->hasKey($branch)) {
            $branchGames->put($branch, new Set());
        }
        /** @var Set $currentGames */
        $currentGames = $branchGames->get($branch)->copy();
        $currentGames->add($games);
        $branchGames->put($branch, $currentGames);

        return new self($branchGames);
    }
}
