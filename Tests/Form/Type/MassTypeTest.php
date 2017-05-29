<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Tests\Form\Type;

class MassTypeTest extends AbstractTypeTest
{
    const TESTED_TYPE = 'MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type\MassType';

    public function testSubmitNull($expected = null, $norm = null, $view = null)
    {
        parent::testSubmitNull($expected, $norm, '');
    }
}
