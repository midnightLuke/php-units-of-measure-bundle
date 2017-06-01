<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class ElectricCurrentTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'electric_current';
    }

    public function getTypeClass()
    {
        return Types\ElectricCurrentType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\ElectricCurrent::class;
    }
}
