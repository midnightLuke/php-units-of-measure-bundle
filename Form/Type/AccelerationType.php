<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity;

class AccelerationType extends AbstractPhysicalQuantityType
{
    const UNIT_CLASS = PhysicalQuantity\Acceleration::class;

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
    public function getBlockPrefix()
    {
        return 'acceleration';
    }
}
