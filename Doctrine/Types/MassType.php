<?php

namespace MidnightLuke\PhpUnitsOfMeasureBundle\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PhpUnitsOfMeasure\PhysicalQuantity\Mass;

class MassType extends Type
{
    const MASS_TYPE = 'mass'; // modify to match your type name
    const STANDARD_UNIT = 'kg';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        // return the SQL used to create your column type. To create a portable column type, use the $platform.
        return $platform->getDecimalTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return new Mass($value, $this::STANDARD_UNIT);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (!$value instanceof Mass) {
            throw new \Exception('Not an instance of Mass');
        }

        // This is executed when the value is written to the database. Make your conversions here, optionally using the $platform.
        return $value->toUnit($this::STANDARD_UNIT);
    }

    public function getName()
    {
        return self::MASS_TYPE; // modify to match your constant name
    }
}
