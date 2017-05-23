<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity\Length;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class LengthType extends AbstractType
{
    private $standard_unit;

    public function setStandardUnit($standard_unit)
    {
        $this->standard_unit = $standard_unit;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Create available choices for units.
        $units = Length::getUnitDefinitions();
        $unit_choices = [];
        $standard_unit = $this->standard_unit;
        foreach ($units as $unit) {
            $unit_choices[$unit->getName()] = $unit->getName();
        }

        // Build form element.
        $builder
            ->add('length', IntegerType::class)
            ->add('unit', ChoiceType::class, [
                'choices' => $unit_choices,
            ]);

        // Simple callback transformer for going back and forth.
        $builder->addModelTransformer(new CallbackTransformer(
            function ($length) use ($standard_unit) {
                if ($length === null) {
                    return [
                        'length' => 0,
                        'unit' => $standard_unit,
                    ];
                }
                return [
                    'length' => $length->toUnit($standard_unit),
                    'unit' => $standard_unit,
                ];
            },
            function ($value) {
                return new Length($value['length'], $value['unit']);
            }
        ));
    }
}
