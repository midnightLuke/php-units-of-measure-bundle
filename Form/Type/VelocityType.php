<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class VelocityType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Velocity::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
