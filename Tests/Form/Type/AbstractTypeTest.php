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
        Type\MassType::class => 'kg',
        Type\LengthType::class => 'm',
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

    public function testSubmitNull($expected = null, $norm = null, $view = null)
    {
        $form = $this->factory->create($this->getTestedType());
        $form->submit(null);

        $tested_type = $this->getTestedType();
        $class = $tested_type::UNIT_CLASS;
        $expected = new $class(0, self::$types[$this->getTestedType()]);
        $norm = $view = [
            'value' => 0,
            'unit' => self::$types[$this->getTestedType()],
        ];

        $this->assertEquals($expected, $form->getData());
        $this->assertEquals($norm, $form->getNormData());
        $this->assertEquals($view, $form->getViewData());
    }
}
