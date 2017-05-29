# PHP Units Of Measure Bundle

[![Build Status](https://travis-ci.org/midnightLuke/php-units-of-measure-bundle.svg?branch=master)](https://travis-ci.org/midnightLuke/php-units-of-measure-bundle)

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
    public function registerBundles()
    {
        $bundles = [
            [...]
            new MidnightLuke\PhpUnitsOfMeasureBundle\MidnightLukePhpUnitsOfMeasureBundle(),
        ];
    }
}
[...]
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
        time:                 s
        velocity:             m/s
        volume:               m^3
```

Note that this is optional and the defaults above will be used otherwise.

## Use

This module allows you to use native PhysicalQuantity types in Doctrine and on
forms.

### Doctrine Use

```php
class Person{
    [...]
    /**
     * @ORM\Column(type="length")
     * @var Length
     */
    private $height;
    [...]
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
