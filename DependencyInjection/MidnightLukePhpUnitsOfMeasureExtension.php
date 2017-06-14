<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection;

use Doctrine\DBAL\Types\Type;
use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types as DoctrineTypes;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @see http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MidnightLukePhpUnitsOfMeasureExtension extends Extension
{
    public static $types = [
        DoctrineTypes\AccelerationType::TYPE_NAME => DoctrineTypes\AccelerationType::class,
        DoctrineTypes\AngleType::TYPE_NAME => DoctrineTypes\AngleType::class,
        DoctrineTypes\AreaType::TYPE_NAME => DoctrineTypes\AreaType::class,
        DoctrineTypes\ElectricCurrentType::TYPE_NAME => DoctrineTypes\ElectricCurrentType::class,
        DoctrineTypes\EnergyType::TYPE_NAME => DoctrineTypes\EnergyType::class,
        DoctrineTypes\LengthType::TYPE_NAME => DoctrineTypes\LengthType::class,
        DoctrineTypes\LuminousIntensityType::TYPE_NAME => DoctrineTypes\LuminousIntensityType::class,
        DoctrineTypes\MassType::TYPE_NAME => DoctrineTypes\MassType::class,
        DoctrineTypes\PressureType::TYPE_NAME => DoctrineTypes\PressureType::class,
        DoctrineTypes\QuantityType::TYPE_NAME => DoctrineTypes\QuantityType::class,
        DoctrineTypes\SolidAngleType::TYPE_NAME => DoctrineTypes\SolidAngleType::class,
        DoctrineTypes\TemperatureType::TYPE_NAME => DoctrineTypes\TemperatureType::class,
        DoctrineTypes\TimeType::TYPE_NAME => DoctrineTypes\TimeType::class,
        DoctrineTypes\VelocityType::TYPE_NAME => DoctrineTypes\VelocityType::class,
        DoctrineTypes\VolumeType::TYPE_NAME => DoctrineTypes\VolumeType::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        foreach (self::$types as $name => $doctrine_class) {
            $def = $container->getDefinition('units_of_measure.form.type.'.$name);
            $def->replaceArgument(0, $config['base_units'][$name]);
        }
    }
}
