<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class AccelerationTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'acceleration';
    }

    public function getTypeClass()
    {
        return Types\AccelerationType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Acceleration::class;
    }
}
