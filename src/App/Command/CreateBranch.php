<?php

declare(strict_types=1);

namespace App\Command;

use App\Command;
use Psr\Http\Message\UriInterface;

final readonly class CreateBranch implements Command
{
    public function __construct(
        public string $name,
        public ?UriInterface $uri = null,
    ) {
    }
}
