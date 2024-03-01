<?php

declare(strict_types=1);

namespace Api\Http;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Query;

interface QueryFactory
{
    public function build(Request $request): Query;
}