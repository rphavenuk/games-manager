<?php

declare(strict_types=1);

namespace Api\Console\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class ConsoleCommandPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container): void
    {
        foreach ($container->findTaggedServiceIds('api.console.command') as $id => $tags) {
            $definition = $container->getDefinition($id);
            if (!$definition->hasTag('console.command')) {
                $definition->addTag('console.command');
            }
        }
    }
}
