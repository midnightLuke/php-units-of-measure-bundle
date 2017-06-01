<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class TemperatureTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'temperature';
    }

    public function getTypeClass()
    {
        return Types\TemperatureType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Temperature::class;
    }
}
