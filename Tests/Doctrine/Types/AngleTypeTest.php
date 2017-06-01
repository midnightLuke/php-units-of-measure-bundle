<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class AngleTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'angle';
    }

    public function getTypeClass()
    {
        return Types\AngleType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Angle::class;
    }
}
