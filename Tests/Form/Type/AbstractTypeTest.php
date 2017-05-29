<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Form\Type;

use MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;
use Symfony\Component\Form\Tests\Extension\Core\Type\BaseTypeTest;
use Symfony\Component\Form\Tests\Fixtures\TestExtension;

abstract class AbstractTypeTest extends BaseTypeTest
{
    public static $types = [
        'kg' => Type\MassType::class,
    ];

    public function getExtensions()
    {
        $this->guesser = $this->getMockBuilder('Symfony\Component\Form\FormTypeGuesserInterface')->getMock();
        $extensions = [];
        foreach (self::$types as $standard_unit => $class) {
            $extension = new TestExtension($this->guesser);
            $extension->addType(new $class($standard_unit));
            $extensions[] = $extension;
        }

        return $extensions;
    }
}
