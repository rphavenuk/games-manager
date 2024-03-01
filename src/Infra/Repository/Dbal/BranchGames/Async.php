<?php

declare(strict_types=1);

namespace Infra\Repository\Dbal\BranchGames;

use DateTimeImmutable;
use Doctrine\DBAL\Connection;
use Generator;
use RpHaven\Games\Branch\Tables;

final readonly class Async
{
    public function __construct(
        private Connection        $connection,
        private DateTimeImmutable $dateTime,
        private Tables            $branch,
    ) {
    }

    public function __invoke(): Generator
    {
        $results = $this->connection->createQueryBuilder()
            ->select('g.name', 'g.system', 'c.start', 'c.end')
            ->from('games', 'g')
            ->innerJoin('g', 'campaigns', 'c', 'g.id = c.game')
            ->executeQuery();

        foreach ($results as $row) {
            yield $row;
        }
    }
}
