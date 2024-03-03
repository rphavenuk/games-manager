<?php

declare(strict_types=1);

namespace Api\Console\Action\ListBranches;

use Api\Console\Action\InputTags;
use Api\Console\ActionConfigurator;
use Api\Console\ActionConfigurator\Traits\ConfigureCommandDefinition;
use Api\Console\ActionConfigurator\Traits\SetInputDefinitions;
use Api\Console\Traits\InputSet;
use Symfony\Component\DependencyInjection\Attribute\TaggedIterator;

final readonly class Configurator implements ActionConfigurator
{
    use InputSet;
    use ConfigureCommandDefinition;
    use SetInputDefinitions;

    public function __construct(
        #[TaggedIterator(InputTags::LIST_BRANCHES->value)]
        iterable $inputs
    ) {
        $this->setInputs($inputs);
    }
}
