<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class LuminousIntensityType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\LuminousIntensity::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
