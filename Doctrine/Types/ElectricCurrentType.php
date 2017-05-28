<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class ElectricCurrentType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\ElectricCurrent::class;
    const STANDARD_UNIT = 'A';
    const TYPE_NAME = 'electric_current';

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
