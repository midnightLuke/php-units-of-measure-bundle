<?php

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
        // Create available choices for units.
        $units = $this->getUnitClass()::getUnitDefinitions();
        $unit_choices = [];
        $standard_unit = $this->standard_unit;
        foreach ($units as $unit) {
            $unit_choices[$unit->getName()] = $unit->getName();
        }

        // Build form element.
        $builder
            ->add('value', IntegerType::class)
            ->add('unit', ChoiceType::class, [
                'choices' => $unit_choices,
            ]);

        // Simple callback transformer for going back and forth.
        $builder->addModelTransformer(new CallbackTransformer(
            function ($value) use ($standard_unit) {
                if ($value === null) {
                    return [
                        'value' => 0,
                        'unit' => $standard_unit,
                    ];
                }
                return [
                    'value' => $value->toUnit($standard_unit),
                    'unit' => $standard_unit,
                ];
            },
            function ($value) {
                return new $this->getUnitClass()($value['value'], $value['unit']);
            }
        ));
    }
}
