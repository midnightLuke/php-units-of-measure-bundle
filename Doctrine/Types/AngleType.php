<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class AngleType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Angle::class;
    const STANDARD_UNIT = 'rad';
    const TYPE_NAME = 'angle';

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
