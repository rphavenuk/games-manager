<?php

declare(strict_types=1);

namespace Api\Console\Action;

use App\Query\QueryBus;
use Api\Console\Action;
use Api\Console\Action\ActiveGames\ActiveGamesFormatter;
use Api\Console\Action\ActiveGames\ActiveGamesQuery;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name:        'rphaven:games',
    description: 'List out active games of RPHaven',
)]
final class ActiveGames extends Command implements Configurated
{
    public function __construct(
        private readonly QueryBus $queryBus,
        private readonly ActiveGamesQuery $activeBranchGames,
        private readonly ActiveGamesFormatter $resultOutputFormatter,
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $query = $this->activeBranchGames->build($input, $output);
        $result = $this->queryBus->handle($query);
        $this->resultOutputFormatter->format($output, $result);

        return Command::SUCCESS;
    }
}
