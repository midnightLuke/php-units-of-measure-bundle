<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Form\Type;

use PhpUnitsOfMeasure\PhysicalQuantity\Mass;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;

class MassType extends AbstractType
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
        $units = Mass::getUnitDefinitions();
        $unit_choices = [];
        $standard_unit = $this->standard_unit;
        foreach ($units as $unit) {
            $unit_choices[$unit->getName()] = $unit->getName();
        }

        // Build form element.
        $builder
            ->add('mass', IntegerType::class)
            ->add('unit', ChoiceType::class, [
                'choices' => $unit_choices,
            ]);

        // Simple callback transformer for going back and forth.
        $builder->addModelTransformer(new CallbackTransformer(
            function ($mass) use ($standard_unit) {
                if ($mass === null) {
                    return [
                        'mass' => 0,
                        'unit' => $standard_unit,
                    ];
                }
                return [
                    'mass' => $mass->toUnit($standard_unit),
                    'unit' => $standard_unit,
                ];
            },
            function ($value) {
                return new Mass($value['mass'], $value['unit']);
            }
        ));
    }
}
