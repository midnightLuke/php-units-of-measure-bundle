<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class QuantityTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'quantity';
    }

    public function getTypeClass()
    {
        return Types\QuantityType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Quantity::class;
    }
}
