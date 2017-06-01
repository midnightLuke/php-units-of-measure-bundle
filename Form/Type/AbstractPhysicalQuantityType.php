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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

abstract class AbstractPhysicalQuantityType extends AbstractType
{
    /**
     * The standard unit to use with this form type.
     */
    protected $standard_unit;

    /**
     * Returns the unit class, usually a member of the
     * PhpUnitsOfMeasure\PhysicalQuantity namespace, but can be any class that
     * extends the PhpUnitsOfMeasure\AbstractPhysicalQuantity class.
     */
    abstract public function getUnitClass();

    /**
     * Construct a new instance of the form type.
     */
    public function __construct($standard_unit)
    {
        $this->standard_unit = $standard_unit;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $unit_class = $this->getUnitClass();

        // Create available choices for units.
        $units = $unit_class::getUnitDefinitions();
        $unit_choices = [];
        $standard_unit = $this->standard_unit;
        foreach ($units as $unit) {
            $unit_choices[$unit->getName()] = $unit->getName();
        }

        // Build form element.
        $builder
            ->add('value', IntegerType::class, [
                'empty_data' => 0,
            ])
            ->add('unit', ChoiceType::class, [
                'choices' => $unit_choices,
                'empty_data' => $this->standard_unit,
            ]);

        // Simple callback transformer for going back and forth.
        $builder->addModelTransformer(new CallbackTransformer(
            function ($value) use ($standard_unit) {
                if ($value === null) {
                    return null;
                }

                return [
                    'value' => $value->toUnit($standard_unit),
                    'unit' => $standard_unit,
                ];
            },
            function ($value) use ($unit_class) {
                if ($value === null || !isset($value['value'])) {
                    return null;
                }

                return new $unit_class($value['value'], $value['unit']);
            }
        ));
    }
}
