<?php

declare(strict_types=1);

namespace Api\Console;

use App\Result;
use Symfony\Component\Console\Output\OutputInterface;

interface ResultOutputFormatter
{
    public function format(OutputInterface $output, ?Result $result = null): void;
}
