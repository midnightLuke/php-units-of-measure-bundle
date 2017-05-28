<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class TemperatureType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Temperature::class;
    const STANDARD_UNIT = 'K';
    const TYPE_NAME = 'temperature';

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
