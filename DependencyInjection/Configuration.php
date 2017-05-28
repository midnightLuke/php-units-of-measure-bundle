<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('units_of_measure');

        $rootNode
            ->children()
                ->arrayNode('base_units')->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('acceleration')->defaultValue('m/s^2')->end()
                        ->scalarNode('angle')->defaultValue('rad')->end()
                        ->scalarNode('area')->defaultValue('m^2')->end()
                        ->scalarNode('electric_current')->defaultValue('A')->end()
                        ->scalarNode('energy')->defaultValue('J')->end()
                        ->scalarNode('length')->defaultValue('m')->end()
                        ->scalarNode('luminous_intensity')->defaultValue('cd')->end()
                        ->scalarNode('mass')->defaultValue('kg')->end()
                        ->scalarNode('pressure')->defaultValue('Pa')->end()
                        ->scalarNode('quantity')->defaultValue('mol')->end()
                        ->scalarNode('solid_angle')->defaultValue('sr')->end()
                        ->scalarNode('temperature')->defaultValue('K')->end()
                        ->scalarNode('time')->defaultValue('s')->end()
                        ->scalarNode('velocity')->defaultValue('m/s')->end()
                        ->scalarNode('volume')->defaultValue('m^3')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
