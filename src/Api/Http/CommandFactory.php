<?php

declare(strict_types=1);

namespace Api\Http;

use Psr\Http\Message\ServerRequestInterface as Request;
use App\Command;
interface CommandFactory
{
    public function build(Request $request): Command;
}