<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class PressureTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'pressure';
    }

    public function getTypeClass()
    {
        return Types\PressureType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Pressure::class;
    }
}
