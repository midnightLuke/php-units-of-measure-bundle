<?php

/*
 * This file is part of the MidnightLukePhpUnitsOfMeasureBundle package.
 *
 * (c) Luke Bainbridge <http://www.lukebainbridge.ca/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace MidnightLuke\PhpUnitsOfMeasureBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use MidnightLuke\PhpUnitsOfMeasureBundle\DependencyInjection\MidnightLukePhpUnitsOfMeasureExtension;
use Doctrine\DBAL\Types\Type;

class MidnightLukePhpUnitsOfMeasureBundle extends Bundle
{
    public function __construct()
    {
        foreach (MidnightLukePhpUnitsOfMeasureExtension::$types as $name => $doctrine_class) {
            if (Type::hasType($name)) {
                Type::overrideType($name, $doctrine_class);
            } else {
                Type::addType($name, $doctrine_class);
            }
        }
    }
}
