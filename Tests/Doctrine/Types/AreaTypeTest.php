<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class AreaTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'area';
    }

    public function getTypeClass()
    {
        return Types\AreaType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Area::class;
    }
}
