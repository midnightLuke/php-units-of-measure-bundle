<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class AreaType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Area::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
