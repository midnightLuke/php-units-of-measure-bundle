<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class SolidAngleTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'solid_angle';
    }

    public function getTypeClass()
    {
        return Types\SolidAngleType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\SolidAngle::class;
    }
}
