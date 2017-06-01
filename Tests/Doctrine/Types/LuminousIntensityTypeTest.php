<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class LuminousIntensityTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'luminous_intensity';
    }

    public function getTypeClass()
    {
        return Types\LuminousIntensityType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\LuminousIntensity::class;
    }
}
