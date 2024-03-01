<?php

declare(strict_types=1);

namespace Api\Console\Action\ActiveGames;

use Api\Console\MessageFactory\QueryFactory;
use App\Query\QueryActiveBranchGames;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final readonly class ActiveBranchGames implements QueryFactory
{

    public function build(InputInterface $input, OutputInterface $output): QueryActiveBranchGames
    {
        // TODO: Implement build() method.
    }
}
