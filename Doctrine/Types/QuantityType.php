<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class QuantityType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Quantity::class;
    const STANDARD_UNIT = 'mol';
    const TYPE_NAME = 'quantity';

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }

    /**
     * {@inheritdoc}
     */
    public function getStandardUnit()
    {
        return self::STANDARD_UNIT;
    }

    /**
     * {@inheritdoc}
     */
    public function getTypeName()
    {
        return self::TYPE_NAME;
    }
}
