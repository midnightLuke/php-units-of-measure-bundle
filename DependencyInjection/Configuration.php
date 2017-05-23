<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('midnight_luke_php_units_of_measure');

        $rootNode
            ->children()
                ->arrayNode('base_units')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('length')->defaultValue('cm')->end()
                        ->scalarNode('mass')->defaultValue('kg')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
