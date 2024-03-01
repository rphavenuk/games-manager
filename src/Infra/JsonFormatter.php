<?php

declare(strict_types=1);

namespace Infra;

interface JsonFormatter
{
    public function format(mixed $data): string;
}
