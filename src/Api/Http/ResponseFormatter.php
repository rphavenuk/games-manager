<?php

declare(strict_types=1);

namespace Api\Http;

use App\Result;
use Psr\Http\Message\ResponseInterface as Response;

interface ResponseFormatter
{
    public function build(?Result $result = null): Response;
}