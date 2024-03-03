<?php

declare(strict_types=1);

namespace Api\Console\Action\ActiveGames;

use Api\Console\Action\InputTags;
use Api\Console\Input\Keys;
use Api\Console\MessageFactory\QueryFactory;
use Api\Console\MessageFactory\Traits\ExtractValuesTrait;
use Api\Console\Traits\InputSet;
use App\Query\QueryActiveBranchGames;
use RpHaven\Games\Branch;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class ActiveGamesQuery implements QueryFactory
{
    use ExtractValuesTrait;
    use InputSet;

    public function __construct(
        #[TaggedIterator(InputTags::LIST_GAMES->value)]
        iterable $inputs
    ) {
        $this->setInputs($inputs);
    }

    public function build(InputInterface $input, OutputInterface $output): QueryActiveBranchGames
    {
        $content = $this->extractValues($input, $output);

        return new QueryActiveBranchGames(new \DateTimeImmutable(), $content->get(Keys::BRANCH_NAME));
    }
}
