<?php

declare(strict_types=1);

namespace Api\Http;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

interface Action
{
    public function __invoke(Request $request): Response;
}