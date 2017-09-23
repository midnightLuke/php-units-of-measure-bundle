# PHP Units Of Measure Bundle

[![Build Status](https://travis-ci.org/midnightLuke/php-units-of-measure-bundle.svg?branch=master)](https://travis-ci.org/midnightLuke/php-units-of-measure-bundle)
[![Coverage Status](https://coveralls.io/repos/github/midnightLuke/php-units-of-measure-bundle/badge.svg?branch=master)](https://coveralls.io/github/midnightLuke/php-units-of-measure-bundle?branch=master)

Provides useful Doctrine and Form types for working with the 
[PHP Units of Measure](https://github.com/PhpUnitsOfMeasure/php-units-of-measure)
Library.

## Installation

Install this bundle using composer:

```
composer require midnightluke/php-units-of-measure-bundle:dev-master
```

Add it to your application kernel (AppKernel.php):

```php
class AppKernel extends Kernel
{
    // [...]
    public function registerBundles()
    {
        $bundles = [
            // [...]
            new MidnightLuke\PhpUnitsOfMeasureBundle\MidnightLukePhpUnitsOfMeasureBundle(),
        ];
    }
    // [...]
}
```

Add the form types you need to doctrine in config.yml:

```yaml
doctrine:
    dbal:
        types:
            acceleration:         MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\AccelerationType
            angle:                MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\AngleType
            area:                 MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\AreaType
            electric_current:     MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\ElectricCurrentType
            energy:               MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\EnergyType
            length:               MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\LengthType
            luminous_intensity:   MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\LuminousIntensityType
            mass:                 MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\MassType
            pressure:             MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\PressureType
            quantity:             MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\QuantityType
            solid_angle:          MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\SolidAngleType
            temperature:          MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\TemperatureType
            uom_time:             MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\TimeType
            velocity:             MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\VelocityType
            volume:               MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types\VolumeType
```

## Configuration

This bundle comes with configuration that allows you to specify the "default"
unit for each unit of measure form type.  This can be configured in your app's
config.yml file like so:

```yaml
units_of_measure:
    base_units:
        acceleration:         m/s^2
        angle:                rad
        area:                 m^2
        electric_current:     A
        energy:               J
        length:               m
        luminous_intensity:   cd
        mass:                 kg
        pressure:             Pa
        quantity:             mol
        solid_angle:          sr
        temperature:          K
        uom_time:             s
        velocity:             m/s
        volume:               m^3
```

Note that this is optional and the defaults above will be used otherwise.

## Use

This module allows you to use native PhysicalQuantity types in Doctrine and on
forms.

### Doctrine Use

```php
class Person
{
    // [...]
    /**
     * @ORM\Column(type="length")
     * @var Length
     */
    private $height;
    // [...]
}
```

### Form Use

```php
$form = $this->createFormBuilder()
    ->add('length', LengthType::class)
    ->add('mass', MassType::class)
    ->add('save', SubmitType::class, array('label' => 'Create Post'))
    ->getForm();
```

## About

### Submitting bugs and feature requests

Bugs and feature request are tracked on [GitHub](https://github.com/midnightLuke/php-units-of-measure-bundle/issues).

### Author

Luke Bainbridge - http://twitter.com/midnightLuke

### License

PHP Units Of Measure Bundle is licensed under the MIT License - see the LICENSE file for details.
