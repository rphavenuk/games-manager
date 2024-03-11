<?php

declare(strict_types=1);

namespace Api\Console\Action\CreateBranch;

use Api\Console\Action\InputTags;
use Api\Console\ActionConfigurator;
use Api\Console\ActionConfigurator\Traits\ConfigureConsoleCommandDefinition;
use Api\Console\ActionConfigurator\Traits\SetInputDefinitions;
use Api\Console\Traits\InputSet;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class Configurator implements ActionConfigurator
{
    use InputSet;
    use ConfigureConsoleCommandDefinition;
    use SetInputDefinitions;

    public function __construct(
        #[TaggedIterator(InputTags::CREATE_BRANCH->value)]
        iterable $inputs
    ) {
        $this->setInputs($inputs);
    }
}
