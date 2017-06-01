<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class LengthTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'length';
    }

    public function getTypeClass()
    {
        return Types\LengthType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Length::class;
    }
}
