<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\DependencyInjection;

use MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection\MidnightLukePhpUnitsOfMeasureExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class MidnightLukePhpUnitsOfMeasureExtensionTest extends AbstractDependencyInjectionTest
{
    public function testLoadWithDefault()
    {
        $container = $this->getContainer();

        $this->assertTrue($container->hasDefinition('units_of_measure.form.type.acceleration'));
        $this->assertTrue($container->hasDefinition('units_of_measure.form.type.angle'));
    }

    // public function testLoadWithCustomValues()
    // {
    //     $container = $this->getContainer(array(array('handlers' => array(
    //         'custom' => array('type' => 'stream', 'path' => '/tmp/symfony.log', 'bubble' => false, 'level' => 'ERROR', 'file_permission' => '0666')
    //     ))));
    //     $this->assertTrue($container->hasDefinition('monolog.logger'));
    //     $this->assertTrue($container->hasDefinition('monolog.handler.custom'));

    //     $logger = $container->getDefinition('monolog.logger');
    //     $this->assertDICDefinitionMethodCallAt(0, $logger, 'useMicrosecondTimestamps', array('%monolog.use_microseconds%'));
    //     $this->assertDICDefinitionMethodCallAt(1, $logger, 'pushHandler', array(new Reference('monolog.handler.custom')));

    //     $handler = $container->getDefinition('monolog.handler.custom');
    //     $this->assertDICDefinitionClass($handler, 'Monolog\Handler\StreamHandler');
    //     $this->assertDICConstructorArguments($handler, array('/tmp/symfony.log', \Monolog\Logger::ERROR, false, 0666));
    // }

    protected function getContainer(array $config = array(), array $thirdPartyDefinitions = array())
    {
        $container = new ContainerBuilder();
        foreach ($thirdPartyDefinitions as $id => $definition) {
            $container->setDefinition($id, $definition);
        }

        $loader = new MidnightLukePhpUnitsOfMeasureExtension();
        $loader->load($config, $container);
        $container->compile();

        return $container;
    }
}
