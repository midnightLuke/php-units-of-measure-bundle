<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class TemperatureType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Temperature::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
