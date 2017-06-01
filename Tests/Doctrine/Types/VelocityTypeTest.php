<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class VelocityTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'velocity';
    }

    public function getTypeClass()
    {
        return Types\VelocityType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Velocity::class;
    }
}
