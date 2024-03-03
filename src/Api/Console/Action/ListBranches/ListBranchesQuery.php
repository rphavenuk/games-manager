<?php

declare(strict_types=1);

namespace Api\Console\Action\ListBranches;

use Api\Console\Action\InputTags;
use Api\Console\MessageFactory\QueryFactory;
use Api\Console\MessageFactory\Traits\ExtractValuesTrait;
use Api\Console\Traits\InputSet;
use App\Query\ListBranches;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class ListBranchesQuery implements QueryFactory
{
    use ExtractValuesTrait;
    use InputSet;

    public function __construct(
        #[TaggedIterator(InputTags::LIST_BRANCHES->value)]
        iterable $inputs
    ) {
        $this->setInputs($inputs);
    }

    public function build(InputInterface $input, OutputInterface $output): ListBranches
    {
        return new ListBranches();
    }
}
