<?php

declare(strict_types=1);

namespace Api\Console\ActionConfigurator;

use Api\Console\ActionConfigurator;
use Api\Console\ActionConfigurator\Traits\ConfigureConsoleCommandDefinition;
use Api\Console\ActionConfigurator\Traits\SetInputDefinitions;
use Api\Console\Traits\InputSet;

final class DefaultActionConfigurator implements ActionConfigurator
{
    use InputSet;
    use ConfigureConsoleCommandDefinition;
    use SetInputDefinitions;

    public function __construct(iterable $taggedInputs)
    {
        $this->setInputs($taggedInputs);
    }
}
