<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Doctrine\Types;

use MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;
use PhpUnitsOfMeasure\PhysicalQuantity;

class AngleTypeTest extends AbstractTypeTest
{
    public function getTypeName()
    {
        return 'angle';
    }

    public function getTypeClass()
    {
        return Types\AngleType::class;
    }

    public function getUnitClass()
    {
        return PhysicalQuantity\Angle::class;
    }
}
