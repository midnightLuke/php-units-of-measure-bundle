<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use PhpUnitsOfMeasure\PhysicalQuantity;

class AreaType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Area::class;
    const STANDARD_UNIT = 'm^2';
    const TYPE_NAME = 'area';

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
