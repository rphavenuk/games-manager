<?php

declare(strict_types=1);

namespace Api\Http;

use App\Result;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;

interface ResponseFormatter
{
    public function build(ServerRequestInterface $request, ?Result $result = null): Response;
}
