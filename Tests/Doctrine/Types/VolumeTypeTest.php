<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class VolumeTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'volume';
    }

    public function getTypeClass()
    {
        return Types\VolumeType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Volume::class;
    }
}
