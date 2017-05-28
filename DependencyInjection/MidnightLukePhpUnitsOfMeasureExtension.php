<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection;

use Doctrine\DBAL\Types\Type;
use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types as DoctrineTypes;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class MidnightLukePhpUnitsOfMeasureExtension extends Extension implements PrependExtensionInterface
{
    private static $types = [
        'acceleration' => DoctrineTypes\AccelerationType::class,
        'angle' => DoctrineTypes\AngleType::class,
        'area' => DoctrineTypes\AreaType::class,
        'electric_current' => DoctrineTypes\ElectricCurrentType::class,
        'energy' => DoctrineTypes\EnergyType::class,
        'length' => DoctrineTypes\LengthType::class,
        'luminous_intensity' => DoctrineTypes\LuminousIntensityType::class,
        'mass' => DoctrineTypes\MassType::class,
        'pressure' => DoctrineTypes\PressureType::class,
        'quantity' => DoctrineTypes\QuantityType::class,
        'solid_angle' => DoctrineTypes\SolidAngleType::class,
        'temperature' => DoctrineTypes\TemperatureType::class,
        'time' => DoctrineTypes\TimeType::class,
        'velocity' => DoctrineTypes\VelocityType::class,
        'volume' => DoctrineTypes\VolumeType::class,
    ];

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        foreach (self::$types as $name => $doctrine_class) {
            if (Type::hasType($name)) {
                Type::overrideType($name, $doctrine_class);
            } else {
                Type::addType($name, $doctrine_class);
            }
        }
    }

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
            $def = $container->getDefinition('units_of_measure.form.type.' . $name);
            $def->replaceArgument(0, $config['base_units'][$name]);
        }
    }
}
