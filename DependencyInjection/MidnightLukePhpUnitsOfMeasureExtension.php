<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MidnightLukePhpUnitsOfMeasureExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        // Set standard unit for form types as a service parameter.
        $container->setParameter(
            'units_of_measure.standard_units.length',
            $config['base_units']['length']
        );
        $container->setParameter(
            'units_of_measure.standard_units.mass',
            $config['base_units']['mass']
        );

        // Add doctrine types.

        // d($container->get('midnight_luke_php_units_of_measure.form.type.mass'));
    }
}
