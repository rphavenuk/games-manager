<?php

declare(strict_types=1);

namespace Api\Http\Action;

use Api\Http\Action;
use Api\Http\QueryFactory;
use Api\Http\ResponseFormatter;
use App\Query\QueryBus;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final readonly class ActiveGames implements Action
{
    public function __construct(
        private QueryBus $queryBus,
        private QueryFactory $queryFactory,
        private ResponseFormatter $responseFormatter,
    ) {
    }


    public function __invoke(
        Request $request
    ): Response {
        $query = $this->queryFactory->build($request);
        $result = $this->queryBus->handle($query);

        return $this->responseFormatter->build($result);
    }
}
