<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Form\Type;

use MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;
use Symfony\Component\Form\Tests\Extension\Core\Type\BaseTypeTest;
use Symfony\Component\Form\Tests\Fixtures\TestExtension;

abstract class AbstractTypeTest extends BaseTypeTest
{
    public static $types = [
        Type\AccelerationType::class => 'm/s^2',
        Type\AngleType::class => 'rad',
        Type\AreaType::class => 'm^2',
        Type\ElectricCurrentType::class => 'A',
        Type\EnergyType::class => 'J',
        Type\LengthType::class => 'm',
        Type\LuminousIntensityType::class => 'cd',
        Type\MassType::class => 'kg',
        Type\PressureType::class => 'Pa',
        Type\QuantityType::class => 'mol',
        Type\SolidAngleType::class => 'sr',
        Type\TemperatureType::class => 'K',
        Type\TimeType::class => 's',
        Type\VelocityType::class => 'm/s',
        Type\VolumeType::class => 'm^3',
    ];

    public function getExtensions()
    {
        $this->guesser = $this->getMockBuilder('Symfony\Component\Form\FormTypeGuesserInterface')->getMock();
        $extensions = [];
        foreach (self::$types as $class => $standard_unit) {
            $extension = new TestExtension($this->guesser);
            $extension->addType(new $class($standard_unit));
            $extensions[] = $extension;
        }

        return $extensions;
    }

    public function testSubmitPhysicalQuantity()
    {
        $tested_type = $this->getTestedType();
        $class = $tested_type::UNIT_CLASS;
        $expected = new $class(5, self::$types[$tested_type]);
        $form = $this->factory->create($this->getTestedType());
        $form->submit(['value' => 5, 'unit' => self::$types[$tested_type]]);
        $this->assertEquals($expected, $form->getData());
    }

    public function testSubmitNull($expected = null, $norm = null, $view = null)
    {
        $form = $this->factory->create($this->getTestedType());
        $form->submit(null);

        $tested_type = $this->getTestedType();
        $class = $tested_type::UNIT_CLASS;
        $norm = $view = [
            'unit' => self::$types[$this->getTestedType()],
        ];

        $this->assertEquals($expected, $form->getData());
        $this->assertEquals($norm, $form->getNormData());
        $this->assertEquals($view, $form->getViewData());
    }
}
