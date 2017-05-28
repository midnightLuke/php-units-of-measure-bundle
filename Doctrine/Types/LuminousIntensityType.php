<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class LuminousIntensityType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\LuminousIntensity::class;
    const STANDARD_UNIT = 'cd';
    const TYPE_NAME = 'luminous_intensity';

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
