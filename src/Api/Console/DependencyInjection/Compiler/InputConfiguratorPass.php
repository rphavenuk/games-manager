<?php

declare(strict_types=1);

namespace Api\Console\DependencyInjection\Compiler;

use Api\Console\ActionConfigurator\DefaultActionConfigurator;
use Symfony\Component\DependencyInjection\Argument\TaggedIteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

final class InputConfiguratorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container): void
    {
        foreach ($container->findTaggedServiceIds('api.console.command.configured') as $id => $tags) {
            $definition = $container->getDefinition($id);

            if (!$definition->getConfigurator()) {
                $definition->setConfigurator($this->configuratorReference($container, $tags[0]['group']));
            }
        }
    }

    private function configuratorReference(ContainerBuilder $container, string $taggedGroup): Reference
    {
        if (!$container->hasDefinition($taggedGroup)) {
            $configuratorDefinition = new Definition(DefaultActionConfigurator::class);
            $configuratorDefinition->addArgument(new TaggedIteratorArgument($taggedGroup));
            $container->setDefinition($taggedGroup, $configuratorDefinition);
        }

        return new Reference($taggedGroup);
    }
}
