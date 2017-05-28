<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class SolidAngleType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\SolidAngle::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
