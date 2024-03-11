<?php

declare(strict_types=1);

namespace Api\Http\ResponseFormatter;

use Api\Http\ResponseFormatter;
use App\Result;
use Infra\JsonFormatter;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;

final class DefaultResponse implements ResponseFormatter
{

    public function __construct(
        HalFactory $halFactory,
        JsonFormatter $jsonFormatter
    ) {
    }

    public function build(ServerRequestInterface $request, ?Result $result = null): Response
    {
        var_dump($result);

        return new Response();
    }
}
