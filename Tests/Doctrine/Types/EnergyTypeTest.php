<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class EnergyTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'energy';
    }

    public function getTypeClass()
    {
        return Types\EnergyType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Energy::class;
    }
}
