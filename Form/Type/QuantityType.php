<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class QuantityType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Quantity::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
