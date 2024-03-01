<?php

declare(strict_types=1);

namespace Api\Console\Action\CreateBranch;

use Api\Console\Input\Keys;
use Api\Console\MessageFactory\CommandFactory;
use Api\Console\MessageFactory\Traits\ExtractValuesTrait;
use App\Command\CreateBranch;
use Ds\Set;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class CreateBranchCommand implements CommandFactory
{
    use ExtractValuesTrait;
    public function __construct(
        #[TaggedIterator('api.console.createbranch.input')]
        iterable $inputs
    ) {
        $this->inputs = new Set($inputs);
    }

    public function build(InputInterface $input, OutputInterface $output): CreateBranch
    {
        $content = $this->extractValues($input, $output);

        return new CreateBranch(
            $content->get(Keys::BRANCH_NAME),
            $content->get(Keys::URI)
        );
    }
}
