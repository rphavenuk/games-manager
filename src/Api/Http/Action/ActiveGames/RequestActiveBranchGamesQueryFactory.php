<?php

declare(strict_types=1);

namespace Api\Http\Action\ActiveGames;

use Api\Http\QueryFactory;
use App\Query;
use App\Query\QueryActiveBranchGames;
use DateTimeImmutable;
use Psr\Http\Message\ServerRequestInterface as Request;
use RpHaven\Games\Branch\Tables;

final class RequestActiveBranchGamesQueryFactory implements QueryFactory
{

    public function build(Request $request): Query
    {
        return new QueryActiveBranchGames(
            $this->getQueryDate($request),
            Tables::create('stratford'),
        );
    }

    private function getQueryDate(Request $request): DateTimeImmutable
    {
        if ($queryDate = $request->getAttribute('date')) {
            return DateTimeImmutable::createFromFormat('Y-m-d', $queryDate);
        }

        return new DateTimeImmutable();
    }

    private function getQueryBranches(Request $request): array
    {
        if ($branches = $request->getAttribute('branches')) {
            foreach ($branches as $branch) {

            }
        }
    }
}
