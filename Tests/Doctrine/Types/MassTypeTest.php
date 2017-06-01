<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class MassTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'mass';
    }

    public function getTypeClass()
    {
        return Types\MassType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Mass::class;
    }
}
