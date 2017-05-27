<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class LengthType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Length::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return UNIT_CLASS;
    }
}
