<?php

declare(strict_types=1);

namespace Api;

use Api\Console\DependencyInjection\Compiler\ConsoleCommandPass;
use Api\Console\DependencyInjection\Compiler\InputConfiguratorPass;
use Api\Console\DependencyInjection\ConsoleExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class Console extends AbstractBundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new ConsoleExtension();
    }

    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new ConsoleCommandPass());
        $container->addCompilerPass(new InputConfiguratorPass());
    }
}
