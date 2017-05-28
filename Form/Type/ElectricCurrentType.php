<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class ElectricCurrentType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\ElectricCurrent::class;

    /**
     * {@inheritdoc}
     */
    public function getUnitClass()
    {
        return self::UNIT_CLASS;
    }
}
