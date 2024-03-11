<?php

declare(strict_types=1);

namespace Api\Console\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final readonly class Configuration implements ConfigurationInterface
{

    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder =  new TreeBuilder('api.console');

        return $treeBuilder;
    }
}
