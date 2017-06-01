<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class TimeTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'uom_time';
    }

    public function getTypeClass()
    {
        return Types\TimeType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Time::class;
    }
}
