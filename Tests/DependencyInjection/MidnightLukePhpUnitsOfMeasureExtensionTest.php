<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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

    protected function getContainer(array $config = [], array $thirdPartyDefinitions = [])
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
