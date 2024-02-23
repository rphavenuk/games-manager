<?php

declare(strict_types=1);

namespace Api\Console\Action\ActiveGames;

use Api\Console\ResultOutputFormatter;
use App\Result;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class ActiveGamesFormatter implements ResultOutputFormatter
{

    public function format(OutputInterface $output, ?Result $result = null): void
    {
        // TODO: Implement format() method.
    }
}