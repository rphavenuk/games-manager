<?php

declare(strict_types=1);

namespace Api\Console\Action\ActiveGames;

use App\Result;
use Api\Console\ResultOutputFormatter;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class ActiveGamesFormatter implements ResultOutputFormatter
{

    public function format(OutputInterface $output, ?Result $result = null): void
    {
        // TODO: Implement format() method.
    }
}
